<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\User;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Mail\ReceivedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home(){
        $adds = Add::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        return view('home', compact('adds'));

    } 
    public function categoryList($name, $category_id){
        $category = Category::find($category_id);
        $adds = $category->adds()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(6);
        // dd($category);
        return view('category', compact('category','adds'));
    }
    public function workindex(){
        return view('work');
    }
    public function worksubmit(Request $request){
        $user_auth = Auth::user();
        $user = Auth::user()->name;
        $email = Auth::user()->email;
        $message = $request->input('message');
        $contact = compact('user', 'message');
        $contatto = compact('user', 'message', 'email');
        Mail::to($email)->send(new ContactMail($contact));
        Mail::to('staff@presto.it')->send(new ReceivedMail($contatto));
        $user_auth->is_revisor = null;
        $user_auth->save();
        return redirect(route('home'))->with('message', 'La tua candidatura è stata inviata con successo.');
    }

    public function locale($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}



