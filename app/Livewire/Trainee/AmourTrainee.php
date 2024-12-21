<?php

namespace App\Livewire\Trainee;

use App\Livewire\Actions\Logout;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AmourTrainee extends Component
{

    use WithPagination, WithoutUrlPagination;


    public $users;
    public $table_sort, $sort_posts;
    public $search = "";
    public $name_pages;
    public $rules;
    protected $paginationTheme='bootstrap';
    #[Layout('layouts.app')]
    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);
        $this->users = User::all();
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

        return view('livewire.trainee.amour-trainee', [
            'posts' => $posts,
            'users' => $this->users,
            'roles' => $this->rules,
            'sort_posts' => $this->sort_posts,
            'name_pages' => $this->name_pages
        ]);
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
        $this->sort_posts = DB::table('posts')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_sort=0;
        $this->posts = Post::all();
    }
}
