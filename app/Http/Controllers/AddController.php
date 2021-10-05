<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddController extends Controller
{
    public function __construct(){
        $this->middleware('auth');   
    }
    public function new() {
        $categories = Category::all();
        return view('form', compact('categories'));
    }
    public function store(Request $request){
        $add = Add::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        $add->category()->associate($request->category);
        return redirect(route('home'))->with('message', 'Il tuo annuncio è stato inserito.');
    }
    public function show(Add $add){
        return view('show', compact('add'));
    }
}
