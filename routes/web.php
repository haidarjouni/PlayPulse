<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/login-page', 'login-page')->name('login-page');
Route::view('/register-page', 'register-page')->name('register-page');
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile');

Route::view('game/register', 'games.games-register')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('register-game');
Route::view('register/characters', 'characters.character-register')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('character-register');

Route::post('/logout', function () {
    Auth::logout();  // Log the user out
    return redirect('/');  // Redirect to the home page or login page
})->name('logout');






























//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::view('profile', 'profile')
//    ->middleware(['auth'])
//    ->name('profile');

require __DIR__.'/auth.php';
