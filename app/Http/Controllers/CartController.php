<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Festival $festival)
    {
        $cart = session()->get('cart', []);
        $cart[] = [
            'id' => $festival->id,
            'name' => $festival->name,
            'location' => $festival->location,
            'date' => $festival->scheduled_at,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Festival toegevoegd aan winkelmandje.');
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart)); // Herindexeren, zodat 0,1,2 klopt
        }

        return redirect()->route('cart.index')->with('success', 'Festival verwijderd uit winkelmandje.');
    }


    public function checkout()
    {
        $cart = session()->get('cart', []);
        $user = auth()->user();

        $aantalFestivals = count($cart);
        $puntenNodig = $aantalFestivals * 10;

        if ($user->points < $puntenNodig) {
            return redirect()->route('cart.index')->with('error', 'Niet genoeg punten!');
        }

        // Punten verwerken
        $user->points -= $puntenNodig;
        $user->points += ($aantalFestivals * 2);
        $user->save();

        // Bestellingen opslaan
        foreach ($cart as $festival) {
            \App\Models\Order::create([
                'user_id' => $user->id,
                'festival_id' => $festival['id'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('dashboard')->with('success', 'Boeking voltooid! Je punten zijn bijgewerkt.');
    }


}
