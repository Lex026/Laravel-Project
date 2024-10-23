<?php

use App\Models\Resume;
use Illuminate\Support\Facades\Route;

// Route for the resume view
Route::get('/', function () {
    $resume = Resume::first(); // Assuming you only have one resume entry
    return view('resume', compact('resume'));
})->name('resume.show');


