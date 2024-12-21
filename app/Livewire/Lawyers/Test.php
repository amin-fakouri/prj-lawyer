<?php

namespace App\Livewire\Lawyers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Test extends Component
{
    #[Layout('layouts.guest')]
    public $find_user_id;
    public $name_pages, $rules;

    public function mount($user_id)
    {
        $this->find_user_id = User::find($user_id);
    }
    public function render()
    {
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

        return view('livewire.lawyers.test');
    }
}
