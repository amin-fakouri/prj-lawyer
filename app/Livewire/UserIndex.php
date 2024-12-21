<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination, WithoutUrlPagination;

    public string $filter = '';
    public ?string $search = '';
    public $users;
    public $table_mode=0;
    public $sort_users;


    #[Layout('layouts.app')]
    public function render()
    {
        $this->users = User::where('username', 'like', '%'.$this->search.'%')->get();
        return view('livewire.user-index');
    }



    #[On('user-created')]
    public function updateUsers()
    {
        return $this->render();
    }

    public function logout(Logout $logout): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('welcome');
    }

    public function delete_id($id)
    {
        User::find($id)->delete();
    }

    public function sort()
    {
        $this->table_mode=1;
        $this->sort_users = DB::table('users')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_mode=0;
        $this->users = User::where('username', 'like', '%'.$this->search.'%')->get();
    }
}
