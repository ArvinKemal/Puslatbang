<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        // Data layanan yang bisa kita ambil dari database
        $services = [
            ['title' => 'Gedung B', 'description' => 'Lantai 1'],
            ['title' => 'Gedung B', 'description' => 'Lantai 2'],
            ['title' => 'Gedung B', 'description' => 'Lantai 3'],
            ['title' => 'Gedung B', 'description' => 'Lantai 4'],            
        ];

        return view('landingpage.landing', compact('services'));
    }
}
