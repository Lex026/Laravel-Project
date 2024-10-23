<?php

namespace App\Http\Controllers;

use App\Models\Resume; // Import the Resume model

class ResumeController extends Controller
{
    public function show()
    {
        $resume = Resume::first(); // Get the first resume
        return view('resume', compact('resume')); // Pass it to the view
    }
}
