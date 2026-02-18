<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validate the request
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:4',
        ]);
        
        // Attempt to authenticate the user
        if(Auth::attempt($credentials)) {
            // Create a new session
            $request->session()->regenerate();

            return redirect()->intended('/');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Password ou email incorretos',
            ]);
        }
    }
}
