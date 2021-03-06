<?php

namespace App\Http\Controllers;

use App\Models\Add;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor');
    }

    public function index(){
        $users = User::orderBy('created_at', 'desc')->get();
        $adds = Add::orderBy('created_at', 'desc')->get();
        return view('admin.index', compact('users', 'adds'));
    }
    
    public function showadd(){
        $adds = Add::where('is_accepted',null)->orderBy('created_at','desc')->get();
        return view('admin.showadd', compact('adds'));
    }

    public function rejectadd(){
        $adds = Add::where('is_accepted',false)->orderBy('created_at','desc')->get();
        return view('admin.rejectadd', compact('adds'));
    }

    private function setAccept($add_id, $value){
        $add=Add::find($add_id);
        $add->is_accepted=$value;
        $add->save();
        return redirect(route('admin.showadd'));
    }
    public function accept($add_id){
        return $this->setAccept($add_id, true);
    }
    public function reject($add_id){
        return $this->setAccept($add_id, false);
    }

    public function back($add_id){
        return $this->setAccept($add_id, null);
    }
}

