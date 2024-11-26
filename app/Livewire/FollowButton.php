<?php

namespace App\Livewire;

use App\Models\Follow;
use Livewire\Component;

class FollowButton extends Component
{
    public $user; //user data i got from the page
    public $isFollowed = false; // to check if the user is followed
    public function mount($user){
        $this->isFollowed = auth()->user()->follows($this->user)->exists();
        $this->user= $user;
    }
    public function follow(){
        if(!(auth()->user()->follows($this->user)->exists())){
            Follow::create([
                'user_id' => auth()->id(),
                'followable_id' => $this->user->id,
                'followable_type' => get_class($this->user),
            ]);
            $this->isFollowed = true;
        }else{
            auth()->user()->follows($this->user)->delete();
            $this->isFollowed = false;
        }
        return redirect(request()->header('Referer'));
    }
    public function render()
    {
        return view('livewire.follow-button');
    }
}
