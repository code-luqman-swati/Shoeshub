<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
    {
        return view('customer.auth.register');
    }



    public function store(Request $request)
    {

        $request->validate([

            'name' => 'required|string|max:255',

            'email' => 'required|email|unique:customers,email',

            'phone' => 'required',

            'password' => 'required|min:6|confirmed',

        ]);



        $customer = Customer::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'password' => Hash::make($request->password),

        ]);



        Auth::guard('customer')->login($customer);



        return redirect()
            ->route('customer/login')
            ->with('success','Account created successfully');

    }



    public function login()
    {
        return view('customer.auth.login');
    }




    public function authenticate(Request $request)
    {


        $credentials = $request->validate([

            'email'=>'required|email',

            'password'=>'required'

        ]);



        if(Auth::guard('customer')->attempt($credentials))
        {

            $request->session()->regenerate();


            return redirect()
                ->route('cart.index');

        }



        return back()->withErrors([

            'email'=>'Invalid credentials'

        ]);

    }




    public function logout(Request $request)
    {

        Auth::guard('customer')->logout();


        $request->session()->invalidate();


        $request->session()->regenerateToken();


        return redirect()
            ->route('customer.login');

    }

}