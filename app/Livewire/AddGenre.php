<?php

namespace App\Livewire;
use App\Models\Genre;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Str;

class AddGenre extends Component
{
    public $slug;
    #[Validate('min:4')]
    public $name;
    public function save(){
        $this->validate();
        $this->slug = Str::slug($this->name);
        Genre::create(
            [
                'name' => $this->name,
                'slug' => $this->slug,
            ]
        );
    }
    public function render()
    {
        return view('livewire.add-genre');
    }
}
