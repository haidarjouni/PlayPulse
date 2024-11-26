<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProfileLayout extends Component
{
    public $user;
    public $followings;
    public $followers;
    /**
     * Create a new component instance.
     *
     * @param $user
     */
    public function __construct($user, $followings = null , $followers = null)
    {
        $this->user = $user;
        $this->followings = $followings;
        $this->followers = $followers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('layouts.profile-layout');
    }
}
