<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\PageRule;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Landing extends Component
{
    public $posts, $users;
    public ?string $search = "";
    public $name_pages;
    public $rules;
    public $modal_mode = 0;
    #[Layout('layouts.guest')]
    public function render()
    {
        $this->posts = DB::table('posts')->orderBy('id', 'desc')->get();

        $this->users = DB::table('users')->orderBy('id', 'desc')
            ->where('f_name', 'like', '%'.$this->search.'%')
            ->orWhere('l_name', 'like', '%'.$this->search.'%')->get();
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();

        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();
        return view('livewire.landing', ['users' => $this->users]);
    }


    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function open_modal()
    {
        $this->modal_mode = 1;
    }

    public function close_modal()
    {
        $this->modal_mode = 0;
        $this->search = '-';
    }
}
