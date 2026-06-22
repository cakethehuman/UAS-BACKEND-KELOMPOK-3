<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class moneyController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('topup.index', compact('user'));
    }

    public function edit(User $topup)
    {
        return view('topup.edit', [
            'user' => $topup
        ]);
    }

    public function update(Request $request)
    {
        $request->validate(['amount' => 'required|numeric|min:1']);

        $user = Auth::user();

        $user->increment('credits', $request->amount);

        return redirect()->route('topup.index')->with('success', 'Credits added successfully.');
    }
}