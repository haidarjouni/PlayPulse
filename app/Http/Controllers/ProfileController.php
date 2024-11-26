<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    // Shared method to retrieve the user by name
    public function getUser($name)
    {
        return User::where('name', $name)->firstOrFail();
    }

    // Game list view for a specific user
    public function gameList($name)
    {
        $user = $this->getUser($name);
        return view('profile.game-list', compact('user'));
    }

    // DLC list view for a specific user
    public function dlcList($name)
    {
        $user = $this->getUser($name);
        return view('profile.dlc-list', compact('user'));
    }

    public function favorites($name)
    {
        $user = $this->getUser($name);
        return view('profile.favorites', compact('user'));
    }

    public function socials($name)
    {
        $user = $this->getUser($name);
        $followers = $user->getFollowers();
        $followings = $user->getFollowing();
        return view('profile.friends', compact('user', 'followings', 'followers'));
    }

    public function show($name)
    {
        $user = $this->getUser($name);
        return view('profile.show', compact('user'));
    }
}
