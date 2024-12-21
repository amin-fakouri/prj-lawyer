<?php

namespace App\Livewire\AutoMasioun;

use Livewire\Attributes\Layout;
use Livewire\Component;

class AutoMasioun extends Component
{
    #[Layout('layouts.guest')]
    public $links;
    public function render()
    {
        $this->links = \App\Models\link::all();
        return view('livewire.auto-masioun.auto-masioun');
    }
}
