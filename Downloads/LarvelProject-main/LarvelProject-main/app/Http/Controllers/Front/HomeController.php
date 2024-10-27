<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant; 

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all restaurants
        $restaurants = Restaurant::all();

        // Pass the restaurants to the view
        return view('front.dashboard', compact('restaurants'));
    }
}
