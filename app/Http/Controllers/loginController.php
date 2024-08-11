<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.login');
    }

    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Flash the email to the session
        Session::flash('email', $request->email);

        // Validate the request
        $request->validate([
            'email' => 'required|email', // Add email validation
            'password' => 'required'
        ],[
            'email.required' => 'Email Wajib Di Isi!',
            'email.email' => 'Format Email Tidak Valid!', // Optional but recommended
            'password.required' => 'Password Wajib Di Isi!'
        ]);

        // Prepare login information
        $credentials = [
            'Email' => $request->email, // Use lowercase 'email' to match the database field
            'Password' => $request->password
        ];

        // Attempt to login
        if (Auth::attempt($credentials)) {
            // Retrieve the authenticated user
            $user = Auth::user();

            // You can now access user data
            // For example, you can pass user data to the view, or use it within your controller
            return redirect('/')->with('Success', 'Berhasil Login!')->with('user', $user);
        } else {
            return redirect('login')->withErrors('Email atau Password Tidak Sesuai!');
        }
    }


    /**
     * Display the specified resource.
     */
    public function register()
    {
        return view('login.register');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
