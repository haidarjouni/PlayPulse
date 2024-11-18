<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        //
    }

    public function show($name){
        $user = \App\Models\User::where('name', $name)->first();
        return view('profile.profile-show', compact('user'));
    }
}
