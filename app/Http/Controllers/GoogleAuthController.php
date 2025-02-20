<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Check if a user already exists with the given google_id
        $user = User::where('google_id', $googleUser->id)->first();

        // If no user exists, check if the email exists (in case it's already registered via normal login)
        if (!$user) {
            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                // Create a new user with Google details
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'profile_image' => $googleUser->avatar,
                    'password' => null,
                ]);
            } else {
                $user->google_id = $googleUser->id;
                $user->save();
            }
        }

        // Log in the user
        Auth::login($user);

        // Redirect to the home page or intended page
        return redirect()->route('home');
    }
}
