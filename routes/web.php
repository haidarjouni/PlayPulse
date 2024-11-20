<?php
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome')->name('home');
Route::view('/login-page', 'User.login')->name('login-page');
Route::view('/register-page', 'User.register')->name('register-page');
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile');

Route::prefix('game')->group(function () {
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::view('register', 'game.register')->name('game.register');
    });
    Route::controller(GameController::class)->group(function () {
        Route::get('index', 'index')->name('game.index');
        Route::get('show/{id}', 'show')->name('game.show');
    });
});

Route::prefix('character')->group(function () {
    Route::controller(CharacterController::class)->group(function () {
        Route::get('index', 'index')->name('character.index');
        Route::get('show/{id}', 'show')->name('character.show');
    });
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::view('register', 'character.register')->name('character.register');
    });
});

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::view('voice-actor/register', 'voice_actor.register')->name('voice-actor.register');
    Route::view('relation/register', 'relation-register')->name('relation.register');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
