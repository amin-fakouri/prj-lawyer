<?php

namespace App\Livewire\Admin;

use App\Models\PageRule;
use App\Models\Post;
use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class RuleList extends Component
{
    #[Layout('layouts.app')]
    public $name_pages;
    public $rules;
    public ?string $search = '';
    public $sort_table;
    public $sort_rules;
    public function render()
    {
        $this->name_pages = PageRule::all();
        $this->rules = Rule::where('title', 'like', '%'.$this->search.'%')->get();
        return view('livewire.admin.rule-list');
    }

    public function delete_rule($id)
    {
        Rule::find($id)->delete();
    }


    public function sort()
    {
        $this->sort_table=1;
        $this->sort_rules = DB::table('rules')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->sort_table=0;
        $this->rules = Post::all();
    }
}
