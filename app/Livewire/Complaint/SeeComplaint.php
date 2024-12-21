<?php

namespace App\Livewire\Complaint;

use App\Models\Complaint;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeeComplaint extends Component
{

    public $find_id;
    public $users;

    #[Layout('layouts.app')]
    public function mount($com_id)
    {
        $this->find_id = Complaint::find($com_id);
    }
    public function render()
    {
        $this->users = User::all();
        return view('livewire.complaint.see-complaint');
    }
}
