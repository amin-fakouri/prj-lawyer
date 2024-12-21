<?php

namespace App\Livewire\Dashboards;

use App\Livewire\Actions\Logout;
use App\Models\Complaint;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;


class AdminDashboard extends Component
{
    public $posts, $complaints, $users, $search_post;
    public ?string $search = '';

    #[Layout('layouts.app')]
    public function render()
    {
        $this->complaints = Complaint::all();
        $this->users = User::all();
        $this->posts = Post::where('title', 'like', '%'.$this->search.'%')->get();
        return view('livewire.dashboards.admin-dashboard');
    }

    public function UpdatePost()
    {
        return $this->boot();
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function delete_post($id)
    {
        Post::find($id)->delete();
    }
}
