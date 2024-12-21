<?php

namespace App\Livewire\Person;

use App\Models\managers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class PersonManagaer extends Component
{
    #[Layout('layouts.guest')]
    public $find_post_id;
    public $users;
    public $posts;
    public function mount($user_id)
    {
        $this->find_post_id = managers::find($user_id);
    }

    public function render()
    {
        return view('livewire.person.person-managaer');
    }
}
