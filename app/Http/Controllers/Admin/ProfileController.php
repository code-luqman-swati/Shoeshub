<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.profile');
    }

    public function edit(){

     $user = Auth()->user();
      return view('admin.profile.edit',compact('user'));

    }

   public function update(Request $request)
{
    $request->validate([

        'name'  => 'required|string|max:191',

        'email' => 'required|email|max:191|unique:users,email,' . Auth::id(),

        'phone' => 'nullable|string|max:191',

        'current_password' => 'nullable|required_with:password',

        'password' => 'nullable|min:8|confirmed',

    ]);


    $admin = Auth::user();


    // Update basic information

    $admin->name = $request->name;

    $admin->email = $request->email;

    $admin->phone = $request->phone;



    // Password change

    if ($request->filled('password')) {


        if (!Hash::check($request->current_password, $admin->password)) {

            return back()
                ->withErrors([
                    'current_password' => 'Current password is incorrect.'
                ]);

        }


        $admin->password = Hash::make($request->password);

    }


    $admin->save();


    return view('admin.profile.profile')
        ->with('success', 'Profile updated successfully.');

}

}