<?php

namespace App\Livewire\ImgPro;

use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Livewire\Component;

class Img extends Component
{
    use WithFileUploads;
    #[Layout('layouts.app')]
    public $find_user_id;
    public $find_user_update;
    public $image;

    public function mount($user_id)
    {
        $this->find_user_id = \App\Models\User::find($user_id);
    }
    public function render()
    {
        return view('livewire.img-pro.img');
    }

    public function update($id)
    {
        $this->find_user_update = \App\Models\User::find($id);

        $validate = $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $validate['image'] = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
        \App\Models\User::find($id)->update([
            'image_profile' => $validate['image']
        ]);

        $this->reset();

        return redirect(\Illuminate\Support\Facades\URL::signedRoute('test_img', ['user_id' => \auth()->user()->id]));
    }
}
