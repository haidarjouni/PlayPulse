<?php
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\VoiceActorController;
use App\Livewire\ActivityPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

Route::view('/', 'welcome')->name('home');
Route::view('/login-page', 'User.login')->name('login-page');
Route::view('/register-page', 'User.register')->name('register-page');
Route::prefix('profile/{name}')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile');
    Route::get('/game-list', [ProfileController::class, 'gameList'])->name('game-list');
    Route::get('/dlc-list', [ProfileController::class, 'dlcList'])->name('dlc-list');
    Route::get('/favorites', [ProfileController::class, 'favorites'])->name('favorites');
    Route::get('/socials', [ProfileController::class, 'socials'])->name('socials');
});


Route::prefix('game')->group(function () {
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::view('register', 'game.register')->name('game.register');
        Route::view('sequels_prequels','game.sequels_prequels')->name('game.sequels_prequels');
    });
    Route::controller(GameController::class)->group(function () {
        Route::get('index', 'index')->name('game.index');
        Route::get('show/{id}', 'show')->name('game.show');
    });
});
Route::prefix('genre')->group(function () {
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::view('register', 'genre.register')->name('genre.register');
        Route::view('add', 'genre.add')->name('add.game.genre');
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
Route::prefix('voice-actor')->group(function () {
    Route::controller(VoiceActorController::class)->group(function () {
        Route::get('show/{id}', 'show')->name('voice-actor.show');
    });
    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::view('register', 'voice-actor.register')->name('voice-actor.register');
    });

});
Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
    Route::view('relation/register', 'relation-register')->name('relation.register');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
