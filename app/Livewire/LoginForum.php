<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginForum extends Component
{
    #[validate('required|email')]
    public $email = "";
    #[validate('required|min:5')]
    public $password = "";

    public function login(){
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Redirect to the desired page after successful login
            return redirect()->route('home');
        } else {
            // If authentication fails, send an error message
            session()->flash('error', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.login-forum');
    }
}
