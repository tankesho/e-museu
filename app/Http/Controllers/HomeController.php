<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

class HomeController extends Controller
{

    public function index()
    {
        $items = Item::where('validation', true)->select('image')->inRandomOrder()->take(5)->get();

        return view('home', compact('items'));
    }
}
