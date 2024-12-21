<?php

namespace App\Livewire\SubmitShekayat;

use App\Models\ComplaintMng;
use http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class SubmitShekayat extends Component
{
    use WithFileUploads;
    #[Layout('layouts.guest')]
    public string $complainee;
    public string $description;

    public string $complainant;

    public $date;
    public $full_name;
    public $clock;
    public function render()
    {
        return view('livewire.submit-shekayat.submit-shekayat');
    }

    public $title, $image, $content, $box;
    public $aaaa;

    public function create()
    {



        $path = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
//        $post = Auth::user()->post()->create([
//            'title' => $this->title,
//            'image_url' => $path,
//            'content' => $this->content,
//            'submit_date_post' => jdate('Y/m/d')
//        ]);


        \App\Models\Complaint::create([
            'user_id' => $this->aaaa,
            'complainant' => $this->complainant,
            'complainee' => $this->complainee,
            'img' => $path,
            'description' => $this->description,
            'submit_date_com' => $this->date,
            'submit_clock_com' => $this->clock
        ]);

        $this->reset();
    }






}
