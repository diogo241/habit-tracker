<?php

namespace App\Http\Controllers;

class SiteController extends Controller
{
    public function index()
    {
        $name = 'Diogo';
        $habits = [
            'Exercise',
            'Meditation',
            'Reading',
        ];
        return view('home', [
            'name' => $name,
            'habits' => $habits,
        ]);
    }
}
