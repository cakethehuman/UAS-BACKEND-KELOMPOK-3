<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatWebController extends Controller
{
    public function create(){
        return view("chat.create");
    }

    public function store(){
        
    }
}
