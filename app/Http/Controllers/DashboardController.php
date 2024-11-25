<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = Message::where('user_id', $user->id)->with('replies')->get();

        return view('dashboard', compact('user', 'messages'));
    }
}
