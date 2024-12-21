<?php

namespace App\Livewire\Lawyers;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Personlw extends Component
{
    #[Layout('layouts.guest')]
    public $find_user_id;
    public function mount($user_id)
    {
        $this->find_user_id = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.lawyers.personlw');
    }
}
