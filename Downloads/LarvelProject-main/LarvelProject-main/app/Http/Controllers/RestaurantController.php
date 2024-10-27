<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant; // Make sure this is imported

class RestaurantController extends Controller
{
    // Display a list of restaurants
    public function index()
    {
        // Get only the restaurants created by the authenticated user
        $restaurants = Restaurant::where('user_id', auth()->id())->get();
        
        return view('restaurants.index', compact('restaurants'));
    }

    public function allRestaurants()
    {
        // Fetch all restaurants
        $restaurants = Restaurant::all();
        
        return view('restaurants.index', compact('restaurants'));
    }



    // Show form for creating a new restaurant
    public function create()
    {
        return view('restaurants.create');
    }

    // Store a new restaurant
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:restaurants',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);
    
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('restaurant_images', 'public'); // Store image in 'public/restaurant_images'
        }
    
        // Create restaurant
        Restaurant::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath, // Save image path to the database
            'user_id' => auth()->user()->id,
            'status' => 'pending'
        ]);
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant added successfully.');
    }
    

    // Show form for editing a restaurant
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('restaurants.edit', compact('restaurant'));
    }

    // Update restaurant
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::findOrFail($id);
    
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:restaurants,email,' . $restaurant->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image file
        ]);
    
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($restaurant->image) {
                Storage::disk('public')->delete($restaurant->image);
            }
    
            // Store the new image
            $imagePath = $request->file('image')->store('restaurant_images', 'public');
        } else {
            $imagePath = $restaurant->image; // Keep the old image if no new one is uploaded
        }
    
        // Update restaurant
        $restaurant->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'image' => $imagePath, // Save image path to the database
            'status' => $request->input('status', $restaurant->status)
        ]);
    
        return redirect()->route('restaurants.index')->with('success', 'Restaurant updated successfully.');
    }
    

    // Delete a restaurant
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('restaurants.index')->with('success', 'Restaurant deleted successfully.');
    }
}
