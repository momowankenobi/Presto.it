<?php

namespace App\Http\Controllers;

use App\Models\Add;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor');
    } 
   
    public function index()
    {
        $add=Add::where('is_accepted',null)->orderBy('created_at','desc')->first();
        return view('revisor.home',compact('add'));
    }
   
    private function setAccept($add_id, $value){
        $add=Add::find($add_id);
        $add->is_accepted=$value;
        $add->save();
        return redirect(route('revisor.home'));
    }
    
    public function accept($add_id){
        return $this->setAccept($add_id, true);
    }
    
    public function reject($add_id){
        return $this->setAccept($add_id, false);
    }
}

