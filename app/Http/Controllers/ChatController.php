<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller
{
    
    public function index(User $user)
    {
        $conversations =  Chat::latest()->get()->unique('sender_id'); 

        return view('app.chat.admin.index',compact('conversations'));
    }
   
    public function show(User $user)
    {

        $conversations =  Chat::latest()->get()->unique('sender_id');
        $allchats =  Chat::where('reciever_id', $user->id)->
                         orWhere('sender_id', $user->id )->get();

        $chats = $allchats->map(function (Chat $chat, $key) {
            $chat->ismine = false;
            
            if ($chat->sender_id == auth()->user()->id) {
                $chat->ismine = true;
            }
            return $chat;
        });
        return view('app.chat.admin.index',compact('conversations','chats','user'));
    }

    public function send(User $user)
    {
        $chat = new Chat();
        $chat->sender_id = auth()->user()->id;
        $chat->reciever_id = $user->id;
        $chat->message = request()->message;
        $chat->save();
        
        return redirect()->route('admin.chat.show',['user'=>$user->id]);
    }

    public function user_index()
    {
        
        $user = auth()->user();

        $conversations =  Chat::latest()->get()->unique('sender_id');
        $allchats =  Chat::where('reciever_id', $user->id)->
                         orWhere('sender_id', $user->id )->get();

        $chats = $allchats->map(function (Chat $chat, $key) {
            $chat->ismine = false;
            
            if ($chat->sender_id == auth()->user()->id) {
                $chat->ismine = true;
            }
            return $chat;
        });
        return view('app.chat.user.index',compact('conversations','chats'));
    }
    
    public function user_send()
    {
        $chat = new Chat();
        $chat->sender_id = auth()->user()->id;
        $chat->reciever_id = 1;
        $chat->message = request()->message;
        $chat->save();
        
        return redirect()->route('user.chat.index');
    }
}
