<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Category;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function home(){
        $adds = Add::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        return view('home', compact('adds'));

    } 
    public function categoryList($name, $category_id){
        $category = Category::find($category_id);
        $adds = $category->adds()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        // dd($category);
        return view('category', compact('category','adds'));
    }
    public function workindex(){
        return view('work');
    }
    public function worksubmit(Request $request){
        $user = Auth::user()->name;
        $email = Auth::user()->email;
        $message = $request->input('message');
        $contact = compact('user', 'service', 'message');
        $contatto = compact('user', 'service', 'message', 'email');
        Mail::to($email)->send(new ContactMail($contact));
    }

    public function locale($locale) {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}



