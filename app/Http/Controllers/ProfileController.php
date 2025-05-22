<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{
    //
    public function update(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'phone' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:1000',
        ]);


        
        $user = auth()->user();

        // Handle image
        if ($request->hasFile('image')) {
            $file_path = public_path("images/photos/" . $user->image);
            if(File::exists($file_path)){
                File::delete($file_path);
            }

            $imageName = uniqid() . '.' . $request->image->extension();
            $request->image->move('images/photos/', $imageName);
            $validated['image'] = $imageName;
        }

        $user->update($validated);


        Session::flash('message', [
            'icon' => 'success',
            'text' => 'Sukses Edit Profile'
        ]);

        return redirect()->route('dashboard');
    }
}
