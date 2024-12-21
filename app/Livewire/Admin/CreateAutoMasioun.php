<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateAutoMasioun extends Component
{
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.create-auto-masioun');
    }
}
