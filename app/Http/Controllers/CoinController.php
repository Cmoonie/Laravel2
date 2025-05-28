<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoinController extends Controller
{
    public function create()
    {
        return view('coins.buy');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $user->points += $request->amount;
        $user->save();

        return redirect()->route('dashboard')->with('success', $request->amount . ' muntjes toegevoegd!');
    }
}

