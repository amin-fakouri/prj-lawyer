<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AllPost extends Component
{

    use WithPagination, WithoutUrlPagination;
    public $posts, $complaints, $users, $search_post;
    public ?string $search = '';
    public $sort_table=0;
    public $sort_posts;

    #[Layout('layouts.app')]
    public function render()
    {
        $this->complaints = Complaint::all();
        $this->users = User::all();
        $this->posts = Post::where('title', 'like', '%'.$this->search.'%')->get();
        return view('livewire.all-post');
    }

    #[On('post-created')]
    public function UpdatePost()
    {
        return $this->mount();
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
        $this->sort_table=1;
        $this->sort_posts = DB::table('posts')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->sort_table=0;
        $this->posts = Post::all();
    }

}
