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
        $add = Add::where('is_accepted',null)->orderBy('created_at','desc')->first();
        return view('admin.showadd', compact('add'));
    }

    public function rejectadd(){
        $add = Add::where('is_accepted',false)->orderBy('created_at','desc')->first();
        return view('admin.rejectadd', compact('add'));
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

    private function setReject($add_id, $value){
        $add=Add::find($add_id);
        $add->is_accepted=$value;
        $add->save();
        return redirect(route('admin.rejectadd'));
    }

    public function back($add_id){
        return $this->setAccept($add_id, null);
    }
}

