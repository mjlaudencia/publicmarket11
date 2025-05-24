<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    // Show the registration form (admin only)
    public function showRegisterForm()
    {
        return view('admin.register-user');
    }

    // Handle the registration request
    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|in:admin,vendor,delivery,customer',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->back()->with('success', 'User registered successfully!');
    }
}
