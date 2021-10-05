<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $adds = Add::orderBy('created_at', 'desc')->take(5)->get();
        return view('home', compact('adds'));

    } 

     public function categoryList($name, $category_id){
        $category = Category::find($category_id);
        $adds = $category->adds()->orderBy('created_at', 'desc')->paginate(5);
        return view('category', compact('category','adds'));
     }


}



