<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\Complaint;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowComplaint extends Component
{
    #[Layout('layouts.app')]
    public $complaints, $users;
    public string $filter = '';
    public ?string $search = '';

    public function render()
    {
        $this->complaints = Complaint::where('complainant', 'like', '%'.$this->search.'%')->get();
        $this->users = User::all();
        return view('livewire.show-complaint');

    }

    public $sort_table=0, $sort_complaints;

    public function sort()
    {
        $this->sort_table=1;
        $this->sort_complaints = DB::table('complaints')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->sort_table=0;
        $this->complaints = Complaint::all();
    }

    public function delete_post($id)
    {
        Complaint::find($id)->delete();
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}
