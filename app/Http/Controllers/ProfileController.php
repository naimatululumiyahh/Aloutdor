<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller{

    public function showProfileAccount()
        {
            // Ambil data user yang sedang login
            $user = Auth::user();
            // Tampilkan view profile dengan data user
            return view('user.profile-account', compact('user'));
        }

    public function showOrders()
    {   
            
    }
    

    // public function updateProfile(Request $request)
    // {
    //     // Validasi input
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
    //     ]);

    //     // Update data user
    //     $user = Auth::user();
    //     $user->update($request->only('name', 'email'));

    //     return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    // }
}