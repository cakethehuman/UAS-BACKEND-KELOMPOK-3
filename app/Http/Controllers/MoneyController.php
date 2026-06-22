<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class moneyController extends Controller
{
    public function index()
    {
        $users = Auth::user();
        return view("topup.index", compact("users"));
    }

    
}
