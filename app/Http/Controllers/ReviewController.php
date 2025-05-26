<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReviewController extends Controller
{
    //
    public function store($id, Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required',
            'comment' => 'required|string|max:30'
        ]);

        $product = Product::find($id);
        // Handle password
        $validated['user_id'] = auth()->user()->id;
        $validated['product_id'] = $product->id;

        // Simpan ke database
        $review = Review::create($validated);

        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses membuat komentar'
        ]);

        return redirect()->route('user.products');
    }
}
