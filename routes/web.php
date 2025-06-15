<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuiceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('juices', JuiceController::class);


    Route::get('/contact', function () {
    return view('frontend.contact');
    })->name('contact');

    Route::get('/juices', function() {
    return view('frontend.juices');
    })->name('juices');

    
    Route::get('/about', function () {
    return view('frontend.about');
    })->name('tips');

    Route::get('/tips', function() {
    return view('frontend.tips');
    })->name('tips');

    Route::get('/footer', function() {
    return view('frontend.footer');
    })->name('footer');
    

});

require __DIR__.'/auth.php';
