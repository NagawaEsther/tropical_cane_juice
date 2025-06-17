<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JuiceController;
use App\Http\Controllers\Admin\AboutSectionController;
use App\Http\Controllers\TipsImageController;
use App\Http\Controllers\HeroImageController;
use App\Models\Juice;
use App\Models\TipsImage;
use Illuminate\Support\Facades\Route;

// Public routes (accessible without authentication)
Route::get('/', [HeroImageController::class, 'index'])->name('home');

Route::get('/juices', function () {
    $juices = Juice::all();
    return view('frontend.juices', compact('juices'));
})->name('juices');

Route::get('/about', [AboutSectionController::class, 'aboutPage'])->name('about');

Route::get('/tips', function () {
    $tipsImages = TipsImage::all();
    return view('frontend.tips', compact('tipsImages'));
})->name('tips');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

Route::get('/footer', function () {
    return view('frontend.footer');
})->name('footer');

// Dashboard routes (protected by auth middleware)
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Hero Images CRUD
    Route::get('/hero-images', [HeroImageController::class, 'adminIndex'])->name('admin.hero_images.index');
    Route::get('/hero-images/create', [HeroImageController::class, 'create'])->name('admin.hero_images.create');
    Route::post('/hero-images', [HeroImageController::class, 'store'])->name('admin.hero_images.store');
    Route::get('/hero-images/{heroImage}/edit', [HeroImageController::class, 'edit'])->name('admin.hero_images.edit');
    Route::put('/hero-images/{heroImage}', [HeroImageController::class, 'update'])->name('admin.hero_images.update');
    Route::delete('/hero-images/{heroImage}', [HeroImageController::class, 'destroy'])->name('admin.hero_images.destroy');
    Route::get('/hero-images/{heroImage}', [HeroImageController::class, 'show'])->name('admin.hero_images.show');

    // Tips Images CRUD
    Route::get('/tips-images', [TipsImageController::class, 'adminIndex'])->name('admin.tips_images.index');
    Route::get('/tips-images/create', [TipsImageController::class, 'create'])->name('admin.tips_images.create');
    Route::post('/tips-images', [TipsImageController::class, 'store'])->name('admin.tips_images.store');
    Route::get('/tips-images/{tipsImage}/edit', [TipsImageController::class, 'edit'])->name('admin.tips_images.edit');
    Route::put('/tips-images/{tipsImage}', [TipsImageController::class, 'update'])->name('admin.tips_images.update');
    Route::delete('/tips-images/{tipsImage}', [TipsImageController::class, 'destroy'])->name('admin.tips_images.destroy');
    Route::get('/tips-images/{tipsImage}', [TipsImageController::class, 'show'])->name('admin.tips_images.show');

    // Juices Resource
    Route::resource('juices', JuiceController::class);

    // About Sections Resource
    Route::resource('about_sections', AboutSectionController::class)->names('admin.about_sections');
});

// Profile routes (protected by auth middleware)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';