<?php

namespace App\Livewire\CreateKoms;

use App\Models\managers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Livewire\Actions\Logout;
use Livewire\WithFileUploads;
use Livewire\Component;

class CreateKoms extends Component
{
    use WithFileUploads;
    public string $filter = '';
    public ?string $search = '';
    public $users;
    public $table_mode=0;
    public $sort_users;


    #[Layout('layouts.app')]
    public function render()
    {
        $this->users = managers::where('full_name', 'like', '%'.$this->search.'%')->get();
        return view('livewire.create-koms.create-koms');
    }

    public function rules()
    {
        return [
            'title' => [
                'required', 'min:5', 'max:255'
            ],
            'image' => [
                'required',
                File::image()->min('1kb')->max('7mb')
            ],
            'content' => [
                'required', 'min:50'
            ],
        ];
    }

    public $phone_number, $image, $content, $full_name, $koms, $role;

    public function createUser()
    {

        $path = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');

        managers::create([
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'image_url' => $path,
            'submit_date_post' => jdate('Y/m/d'),
            'about' => $this->content,
            'koms' => $this->koms,
        ]);

        $this->reset();
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function delete_id($id)
    {
        managers::find($id)->delete();
    }

    public function sort()
    {
        $this->table_mode=1;
        $this->sort_users = DB::table('managers')->orderBy('id', 'desc')->get();
    }

    public function default()
    {
        $this->table_mode=0;
        $this->users = managers::where('full_name', 'like', '%'.$this->search.'%')->get();
    }
}
