<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Conversation;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = Conversation::where('user_id', $user->id)->with('messages')->get();

        return view('dashboard', compact('user', 'conversations'));
    }
}
