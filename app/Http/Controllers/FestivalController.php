<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $festivals = Festival::all();
        return view('festivals.index', compact('festivals'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('festivals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
        ]);
        Festival::create($validated);
        return redirect()->route('festivals.index')->with('success', 'Festival toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        return view('festivals.show', compact('festival'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        return view('festivals.edit', compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
        ]);
        $festival->update($validated);
        return redirect()->route('festivals.index')->with('success', 'Festival bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        $festival->delete();
        return redirect()->route('festivals.index')->with('success', 'Festival verwijderd.');
    }

    public function userIndex()
    {
        $festivals = Festival::all();
        return view('festivals.public.index', compact('festivals'));
    }
}
