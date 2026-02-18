<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        $name = 'Diogo';
        $email = 'diogo@gmail.com';

        return view('home', compact('name', 'email'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }
}
