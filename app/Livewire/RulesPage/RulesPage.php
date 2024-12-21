<?php

namespace App\Livewire\RulesPage;

use App\Models\PageRule;
use App\Models\Post;
use App\Models\Rule;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class RulesPage extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $paginationTheme='bootstrap';

    public $find_id;
    public $sort_rules;
    public $table_sort;

    public $name_pages;
    public ?string $search = "";
    #[Layout('layouts.guest')]
    public function mount($page_id)
    {
        $this->find_id = PageRule::find($page_id);
    }
    public function render()
    {
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $rules =DB::table('rules')->where('title', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.rules-page.rules-page', [
            'rules' => $rules,
            'name_pages' => $this->name_pages
        ]);
    }


    public function sort()
    {
        $this->table_sort=1;
        $this->sort_rules = DB::table('rules')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_sort=0;
        $this->rules = Rule::all();
    }
}
