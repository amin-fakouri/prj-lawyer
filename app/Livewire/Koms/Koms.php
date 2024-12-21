<?php

namespace App\Livewire\Koms;

use App\Livewire\Actions\Logout;
use App\Models\managers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Koms extends Component
{
    #[Layout('layouts.guest')]
    public $posts;

    public $sort_table;
    public $table_sort;
    public $search;
    public $sort_posts;
    public $users;

    public function render()
    {
        $this->posts = managers::where('full_name', 'like', '%'.$this->search.'%')->get();
        $this->users = User::all();
        return view('livewire.koms.koms');
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
        $this->sort_posts = DB::table('managers')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_sort=0;
        $this->posts = Post::all();
    }
}
