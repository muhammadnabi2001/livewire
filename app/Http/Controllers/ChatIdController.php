<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ChatIdController extends Controller
{
    public function chat()
    {
        $users=User::where('id','!=',auth()->user()->id)->get();
       // dd($users);
        return view('chat',['users'=>$users]);
    }
}
