<?php

namespace App\Livewire\News;

use App\Livewire\Actions\Logout;
use App\Models\Post;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AllNews extends Component
{
    use WithPagination, WithoutUrlPagination;


    #[Layout('layouts.guest')]
    public $search = '';
    protected $paginationTheme='bootstrap';
    public $sort_posts;
    public $table_sort;
    public $users;
    public $name_pages, $rules;

    public function render()
    {
        // جستجوی پست‌ها با استفاده از paginate
        $posts = Post::where('title', 'like', '%'.$this->search.'%')->orderBy('id', 'desc')->paginate(10);

        // بارگذاری کاربران و قوانین
        $this->users = User::all();
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();
        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();
        return view('livewire.news.all-news', [
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
        Post::findOrFail($id)->delete();
    }

    public function sort()
    {
        $this->table_sort = 1;
        // اگر می‌خواهید پست‌ها را بر اساس ID مرتب کنید
        $this->sort_posts = Post::orderBy('id', 'desc')->paginate(5);
    }

    public function default()
    {
        $this->table_sort = 0;
        $posts = Post::paginate(5);
    }
}
