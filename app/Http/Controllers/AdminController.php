<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth.admin');
    }
    
    public function showrev(){
        $user = User::where('is_revisor',null)->orderBy('created_at','desc')->first();
        return view('admin.showrev',compact('user'));
    }
   
    private function setAccept($user_id, $value){
        $user = User::find($user_id);
        $user->is_revisor = $value;
        $user->save();
        return redirect(route('admin.showrev'));
    }
    
    public function accept($user_id){
        return $this->setAccept($user_id, true);
    }
    
    public function reject($user_id){
        return $this->setAccept($user_id, false);
    }
}
