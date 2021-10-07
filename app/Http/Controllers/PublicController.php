<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(){
        $adds = Add::where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
        return view('home', compact('adds'));

    } 

    public function categoryList($name, $category_id){
        $category = Category::find($category_id);
        $adds = $category->adds()->where('is_accepted', true)->orderBy('created_at', 'desc')->paginate(5);
         return view('category', compact('category','adds'));
    }

}



