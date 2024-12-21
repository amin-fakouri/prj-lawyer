<?php

namespace App\Livewire\Admin;

use App\Models\PageRule;
use App\Models\Rule;
use Illuminate\Support\Facades\File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateRule extends Component
{
    use WithFileUploads;
    public $name_pages;
    #[Layout('layouts.app')]
    public function render()
    {
        $this->name_pages = PageRule::all();
        return view('livewire.admin.create-rule');
    }

    public function rules()
    {
        return [
            'title' => [
                'required', 'min:5', 'max:255'
            ],
            'content' => [
                'required', 'min:50'
            ],
        ];
    }

    #[Validate]
    public $title, $image, $content, $box, $category;

    public function createUser()
    {

        $this->validate();


        $path = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
//        $post = Auth::user()->post()->create([
//            'title' => $this->title,
//            'image_url' => $path,
//            'content' => $this->content,
//            'submit_date_post' => jdate('Y/m/d')
//        ]);

        Rule::create([
            'title' => $this->title,
            'image_url' => $path,
            'content' => $this->content,
            'category' => $this->category,
            'submit_date_post' => jdate('Y/m/d')
        ]);

        $this->reset();
    }
}
