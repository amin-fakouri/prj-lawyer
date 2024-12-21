<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Managers extends Component
{
    #[Layout('layouts.guest')]
    public $managers;

    public $sort_table;
    public $table_sort;
    public $search;
    public $sort_managers;
    public $users;
    public $name_pages;
    public $rules;

    public function render()
    {
        $this->managers = \App\Models\managers::where('full_name', 'like', '%'.$this->search.'%')->get();
        $this->users = User::all();
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

        return view('livewire.managers');
    }

    public function logout(Logout $logout): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('welcome');
    }

    public function delete_post($id)
    {
        Post::find($id)->delete();
    }


    public function sort()
    {
        $this->table_sort=1;
        $this->sort_managers = DB::table('managers')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_sort=0;
        $this->managers = Post::all();
    }
}
