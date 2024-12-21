<?php

namespace App\Livewire\RulesPage;

use App\Models\Post;
use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SeeDetailsRules extends Component
{
    #[Layout('layouts.guest')]
    public $find_post_id;
    public $name_pages;
    public $rules;
    public function mount($post_id)
    {
        $this->find_post_id = Rule::find($post_id);
    }
    public function render()
    {
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();
        return view('livewire.rules-page.see-details-rules');
    }
}
