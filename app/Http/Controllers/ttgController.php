<?php

namespace App\Http\Controllers;

use App\Models\ttg;
use Illuminate\Http\Request;

class ttgController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ttgs = ttg::all();

        return view('dashboard',compact('ttgs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ttg.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

         $request->validate(['name' => 'required|string|max:200',
            'players' => 'required|int',
            'description' => 'required|string|max:200',
        ]);

        ttg::create($request->all());
        return redirect()->route('ttg.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(ttg $ttg)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ttg $ttg)
    {
        return view('ttg.edit', compact('ttg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ttg $ttg)
    {
        $request->validate

        (['name' => 'required|string|max:200',
            'players' => 'required|integer',
            'description' => 'required|string|max:1000']);


        $ttg->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Item updated successfully!');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ttg $ttg)
    {
        $ttg->delete();

        return redirect()->route('ttg.index')->with('success', 'Item deleted successfully!');
    }
}


