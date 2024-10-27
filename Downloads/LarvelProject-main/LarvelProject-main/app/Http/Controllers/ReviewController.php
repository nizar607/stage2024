<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('reviews.index', ["reviews" => $reviews,    "association" => [
            "nom" => "Example Association",
            "adresse" => "1234 Example Street",
            "telephone" => "123-456-7890",
            "email" => "contact@example.com",
            "image" => "example-image.jpg"
        ]]);
    }


    public function adminIndex()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', ["reviews" => $reviews,    "association" => [
            "nom" => "Example Association",
            "adresse" => "1234 Example Street",
            "telephone" => "123-456-7890",
            "email" => "contact@example.com",
            "image" => "example-image.jpg"
        ]]);
    }
    

    /**
     * Show the form for creating a new donation.
     */
    public function create()
    {
        $reviews = Review::all();
        return view('reviews.create', ["reviews" => $reviews, "user_id" => auth()->id()]);
    }

    /**
     * Store a newly created donation in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('review_images', 'public'); // Store image in 'public/restaurant_images'
        }

        // Create a new review entry
        $review = new Review([
            'user_id' => auth()->user()->id,
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'image' => $imagePath, // Store image if uploaded
        ]);

        $review->save();

        return redirect()->route('reviews.index')->with('success', 'Review added successfully.');
    }




    /**
     * Display the specified donation.
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified donation.
     */
    public function edit($id)
    {
        $review = Review::findOrFail($id);
        return view('reviews.edit', ['review' => $review]);
    }

    public function update(Request $request, $id)
    {


        $review = Review::findOrFail($id);
        
        $request->validate([
            'title' => 'required',
            'text' => 'required|string|min:2',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image file
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($review->image) {
                Storage::disk('public')->delete($review->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('review_images', 'public');
        } else {
            $imagePath = $review->image; // Keep the old image if no new one is uploaded
        }

        // Update restaurant
        $review->update([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'image' => $imagePath,
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }


    /**
     * Remove the specified donation from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }

    public function adminDestroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }

}
