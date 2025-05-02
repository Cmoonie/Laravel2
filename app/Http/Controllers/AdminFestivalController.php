<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class AdminFestivalController extends Controller
{
    public function index()
    {
        $festivals = Festival::all();
        return view('admin.index', compact('festivals'));
    }

}
