<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/login-page', 'login-page')->name('login-page');
Route::view('/register-page', 'register-page')->name('register-page');
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile');

Route::view('games/register', 'games.games-register')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('game-register');
Route::controller(GameController::class)->group(function () {
    Route::get('games/index','index')->name('games.index');
    Route::get('games/show/{id}','show')->name('games.show'); // Fixed route
});
Route::view('characters/register', 'characters.character-register')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('character-register');
Route::view('voice-actor/register', 'voice_actor.register-voice-actor')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('register-voice-actor');
Route::view('relation/register', 'relation-register')->middleware(\App\Http\Middleware\AdminMiddleware::class)->name('relation-register');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

require __DIR__.'/auth.php';
