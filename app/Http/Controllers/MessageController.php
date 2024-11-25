<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::all();
        return view('messages.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required']);
        Message::create($request->all());
        return redirect()->route('messages.index');
    }

    public function markAsRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->route('messages.index');
    }
}
