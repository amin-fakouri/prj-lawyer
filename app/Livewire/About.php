<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class About extends Component
{
    #[Layout('layouts.guest')]
    public $abouts;
    public function render()
    {
        $this->abouts = \App\Models\CreateAbout::all();
        return view('livewire.about');
    }
}
