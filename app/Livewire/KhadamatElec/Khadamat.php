<?php

namespace App\Livewire\KhadamatElec;

use App\Models\link;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Khadamat extends Component
{
    #[Layout('layouts.guest')]
    public $links;
    public function render()
    {
        $this->links = link::all();
        return view('livewire.khadamat-elec.khadamat');
    }
}
