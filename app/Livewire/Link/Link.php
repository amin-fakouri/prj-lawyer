<?php

namespace App\Livewire\Link;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Link extends Component
{
    #[Layout('layouts.app')]
    public $links;
    public $link;
    public $role;
    public function render()
    {
        $this->links = \App\Models\link::all();
        return view('livewire.link.link');
    }

    public function create()
    {
        \App\Models\link::create([
            'link' => $this->link,
            'role' => $this->role
        ]);

        $this->reset([]);
    }

    public function delete_post($id)
    {
        \App\Models\link::find($id)->delete();
    }
}
