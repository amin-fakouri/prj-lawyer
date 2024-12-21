<?php

namespace App\Livewire\News;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SingleNews extends Component
{
    #[Layout('layouts.guest')]
    public $find_post_id;
    public $users;
    public $posts;
    public $name_pages,$rules;

    public function mount($post_id)
    {
        $this->find_post_id = Post::find($post_id);
    }

    public function render()
    {
        $this->users = User::all();
        $this->posts = DB::table('posts')->orderBy('id', 'desc')->get();
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();

        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

        return view('livewire.news.single-news');
    }
}
