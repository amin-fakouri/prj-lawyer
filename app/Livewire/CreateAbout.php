<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateAbout extends Component
{
    #[Layout('layouts.app')]
    public $about;
    public $abouts;
    public function render()
    {
        $this->abouts = \App\Models\CreateAbout::all();
        return view('livewire.create-about');
    }

    public function create()
    {
        \App\Models\CreateAbout::create([
            'about' => $this->about
        ]);

        $this->reset();
    }

    public function delete_post($id)
    {
        \App\Models\CreateAbout::find($id)->delete();
    }
}
