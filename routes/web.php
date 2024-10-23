<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('contacto', 'contact')->name('contact');
<<<<<<< HEAD
=======
Route::resource('blog', PostController::class)
    ->names('posts')
    ->parameters(['blog' => 'post']);
Route::view('nosotros', 'about')->name('about');
>>>>>>> 4e4b122b329b6bd1c8e09b5759611822b9944003

Route::resource('blog', PostController::class)
    ->names('posts')
    ->parameters(['blog' => 'post']);

Route::view('nosotros', 'about')->name('about');
// dsasdadads
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
