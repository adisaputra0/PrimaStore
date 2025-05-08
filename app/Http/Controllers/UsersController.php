<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
{
    public function index(){

        $users = Users::latest()->get();
        return view ('admin.users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable',
            'ktm' => 'nullable|file|max:2048',
            'role' => 'required|in:admin,penjual,pembeli'
        ]);

        $image = $request->file('image')?->store('images', 'public');
        $ktm = $request->file('ktm')?->store('ktms', 'public');

        Users::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'image' => $image,
            'bio' => $request->bio,
            'ktm' => $ktm,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }
    public function update(Request $request, Users $user)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable',
            'image' => 'nullable|image|max:2048',
            'bio' => 'nullable',
            'ktm' => 'nullable|file|max:2048',
            'role' => 'required|in:admin,penjual,pembeli'
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($user->image);
            $user->image = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('ktm')) {
            Storage::disk('public')->delete($user->ktm);
            $user->ktm = $request->file('ktm')->store('ktms', 'public');
        }

        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'role' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function destroy(Users $user)
    {
        Storage::disk('public')->delete([$user->image, $user->ktm]);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
