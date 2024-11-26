<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $conversations = Conversation::with('user', 'messages.user')->get();
        return view('messages.index', compact('conversations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $conversation = Conversation::firstOrCreate([
            'user_id' => auth()->id(),
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Bericht succesvol verzonden!');
    }

    public function reply(Request $request, Conversation $conversation)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        Message::create([
            'conversation_id' => $conversation->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Antwoord succesvol verzonden!');
    }

    public function markAsRead(Message $message)
    {
        $message->is_read = true;
        $message->save();

        return redirect()->route('messages.index');
    }
}
