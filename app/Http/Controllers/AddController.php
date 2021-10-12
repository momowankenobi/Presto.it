<?php

namespace App\Http\Controllers;

use App\Jobs\ResizeImage;
use App\Models\Add;
use App\Models\Images;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request){
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
            $i=new Images();
            $fileName=basename($image);
            $newFileName="public/adds/{$add->id}/{$fileName}";
            Storage::move($image, $newFileName);
            dispatch(new ResizeImage(
                $newFileName,
                300,
                150
            ));
            $i->file=$newFileName;
            $i->add_id=$add->id;
            $i->save();
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));
        return redirect(route('home'))->with('message', 'Il tuo annuncio è stato inserito.');
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

    public function show(Add $add){
        return view('show', compact('add'));
    }

    public function search(Request $request){
        $q = $request->input('q');
        $adds = Add::search($q)->where('is_accepted', true)->get();
        return view ('search', compact('q', 'adds'));
    }
}
