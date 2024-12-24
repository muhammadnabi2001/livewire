<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Models\ChatId;
use App\Models\Messages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Broadcast;
use Livewire\Attributes\Validate;

class MessagesController extends Controller
{
    public function message(User $user)
    {
        // dd($user->name);
        $users = User::where('id', '!=', auth()->user()->id)->get();
        $chatId = ChatId::where(function ($query) use ($user) {
            $query->where('from_id', auth()->user()->id)->where('to_id', $user->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('from_id', $user->id)->where('to_id', auth()->user()->id);
        })->first();
        if (is_null($chatId)) {
            $chatId = ChatId::create([
                'from_id' => auth()->user()->id,
                'to_id' => $user->id
            ]);
        }
        $models = Messages::where('chat_id', $chatId->id)->orderBy('created_at', 'desc')->get();
        return view('message', ['users' => $users, 'ga' => $user,'chatId'=>$chatId,'models'=>$models]);
    }
    public function store(Request $request,$chatId)
    {
        //dd($chatId,$request->text);
        $data=$request->validate([
            'text'=>'required'
        ]);
        $data['chat_id']=$chatId;
        $Message=Messages::create($data);
        Broadcast(new ChatEvent($Message));
        return back();
    }
}
