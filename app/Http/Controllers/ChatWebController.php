<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChatWebController extends Controller
{
    public function index($chat_id = null)
    {
        return view('chat.index', [
            'chatId' => $chat_id
        ]);
    }

    public function store()
    {
        $chatId = Str::uuid()->toString();
        return redirect()->route('chat.index', ['chat_id' => $chatId]);
    }
}