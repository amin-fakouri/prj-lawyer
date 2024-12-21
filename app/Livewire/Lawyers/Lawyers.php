<?php

namespace App\Livewire\Lawyers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Lawyers extends Component
{

    use WithPagination, WithoutUrlPagination;

    #[Layout('layouts.guest')]
    public $user_sorts, $table_sort=0;
    public ?string $search = '';
    public ?string $search_2 = ' ';
    protected $paginationTheme='bootstrap';

    public $name_pages, $rules;
    public function render()
    {
        $users = DB::table('users')->orderBy('id', 'desc')
            ->where('f_name', 'like', '%'.$this->search.'%')->paginate(10);


        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

        return view('livewire.lawyers.lawyers', [
            'users' => $users,
            'name_pages' => $this->name_pages,
            'rules' => $this->rules
        ]);
    }

    public function sort()
    {
        $this->table_sort=1;
        $this->user_sorts = DB::table('users')->where('f_name', 'like', '%'.$this->search.'%')->get();
    }

    public function default()
    {
        $this->table_sort=0;
        $this->users = DB::table('users')->orderBy('id', 'desc')->get();
    }
}
