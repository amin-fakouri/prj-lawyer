<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageProfile extends Component
{
    use WithFileUploads;

    public $find_user_id;

    #[Layout('layouts.app')]
    public function mount($user_id)
    {
        $this->find_user_id = User::find($user_id);
    }

    public function render()
    {
        return view('livewire.actions-livewire.image-profile');
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

    #[Validate]
    public $image;

    public function update_image($id)
    {
        $path = $this->image->storeAs('image', $this->image->getClientOriginalName(), 'public');

        User::find($id)->update([
            'image_profile' => $path
        ]);
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}
