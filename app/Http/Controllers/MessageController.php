<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages', compact('messages'));
    }

    public function markAsRead(Message $message)
    {
        $message->is_read = true;
        $message->save();

        return redirect()->route('messages.index');
    }
}
