<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatWebController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }
}