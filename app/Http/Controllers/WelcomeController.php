<?php

namespace App\Http\Controllers;


use App\Models\{
    Banner,
};

class WelcomeController extends Controller
{
    public function index()
    {
        $banners = Banner::with('image')->get();
        return view('welcome', compact('banners'));
    }
}
