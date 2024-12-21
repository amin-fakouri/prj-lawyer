<?php

namespace App\Livewire\Admin;

use App\Models\PageRule;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreatePageRule extends Component
{
    #[Layout('layouts.app')]
    public $page_rules;
    public $page_name;
    public function render()
    {
        $this->page_rules = PageRule::all();
        return view('livewire.admin.create-page-rule');
    }

    public function create()
    {
        PageRule::create([
            'name_page' => $this->page_name
        ]);
        $this->reset([]);
    }

    public function delete_page($id)
    {
        PageRule::find($id)->delete();
    }
}
