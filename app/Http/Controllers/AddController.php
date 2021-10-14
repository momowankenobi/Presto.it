<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Images;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\Request;
use App\Http\Requests\AddRequest;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AddController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('search', 'show');   
    }
    public function new() {
        $uniqueSecret = old('uniqueSecret', base_convert(sha1(uniqid(mt_rand())), 16, 36));
        $categories = Category::all();
        return view('form', compact('categories', 'uniqueSecret'));
    }

    public function store(AddRequest $request){
        $add = Auth::user()->adds()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category
        ]);
        $uniqueSecret=$request->input('uniqueSecret'); 
        $images=session()->get("images.{$uniqueSecret}", []);
        $removedimages=session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedimages);
        foreach ($images as $image){
            $i = new Images();
            $fileName = basename($image);
            $newFileName = "public/adds/{$add->id}/{$fileName}";
            Storage::move($image, $newFileName);
            $i->file = $newFileName;
            $i->add_id = $add->id;
            $i->save();
            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($newFileName, 300, 150),
                new ResizeImage($newFileName, 400, 300)
            ])->dispatch($i->id);
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('home'))->with('message', 'Il tuo annuncio è in fase di revisione!');
    }

    public function upload(Request $request){
        $uniqueSecret=$request->input('uniqueSecret');  
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
        dispatch(new ResizeImage(
            $fileName,
            120,
            120
        ));
        session()->push("images.{$uniqueSecret}", $fileName);
        return response()->json(["id"=>$fileName]);
    }

    public function show(Add $add){
        return view('show', compact('add'));
    }

    public function edit(Add $add){
        return view('editor', compact('add'));
    }

    public function update(AddRequest $request, Add $add){
        $add->title = $request->title;
        $add->description = $request->description;
        $add->price = $request->price;
        $add->category_id = $request->category;
        $add->is_accepted = null;
        $add->save();
        return redirect(route('home'))->with('message', 'Il tuo annuncio è stato modificato, ed è in fase di revisione!');
    }

    public function remove(Request $request){
        $uniqueSecret=$request->input('uniqueSecret'); 
        $fileName = $request->input('id');
        session()->push("removedimages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json("ok");
    }

    public function getImages(Request $request){
        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedimages=session()->get("removedimages.{$uniqueSecret}", []);
        $images = array_diff($images, $removedimages);
        $data = [];
        foreach ($images as $image){
            $data[] = [
                'id'  => $image,
                'src' => Images::getUrlByFilePath($image, 120, 120)
            ];
        }
        return response()->json($data);
    }

    public function search(Request $request){
        $q = $request->input('q');
        $adds = Add::search($q)->where('is_accepted', true)->get();
        return view ('search', compact('q', 'adds'));
    }

    public function destroy(Add $add){
        $add->category()->dissociate();
        $add->images()->delete();
        $add->delete();
        return redirect(route('home'))->with('messageDelete', 'Il tuo annuncio è stato eliminato!');
    }
}
