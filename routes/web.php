<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuiceController;
use App\Http\Controllers\Admin\AboutSectionController;

use App\Models\Juice;

Route::get('/juices', function () {
    $juices = Juice::all();
    return view('frontend.juices', compact('juices'));
});



use App\Models\AboutSection;

Route::get('/about', function() {
    $sections = AboutSection::all();
    return view('frontend.about', compact('about'));
});


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

// Route::resource('juices', JuiceController::class);

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::resource('juices', JuiceController::class);
    
});

Route::prefix('dashboard')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('about_sections', AboutSectionController::class);
});


    Route::get('/contact', function () {
    return view('frontend.contact');
    })->name('contact');

    
    Route::get('/about', [AboutSectionController::class, 'aboutPage'])->name('about');

    Route::get('/tips', function() {
    return view('frontend.tips');
    })->name('tips');

    Route::get('/footer', function() {
    return view('frontend.footer');
    })->name('footer');
    

});

require __DIR__.'/auth.php';
