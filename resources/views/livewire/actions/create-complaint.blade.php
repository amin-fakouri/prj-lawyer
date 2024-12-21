<?php

use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\{Layout, Title, Validate};
use Illuminate\Validation\Rules\Password;

new
#[Layout('layouts.app')]
class extends Component {
    #[Validate('required|string|min:3|max:20')]
    public string $complainee;
    #[Validate('required|min:15')]
    public string $description;

    #[Validate('required|string|min:3|max:20')]
    public string $complainant;

    public $date;
    public $clock;
    public $image;
    use WithFileUploads;

    public function rules()
    {
        return [
            'image' => [
                'required',
                File::image()->min('1kb')->max('7mb')
            ],
            'description' => [
                'required', 'min:50'
            ],
        ];
    }


    #[Validate]
    public function fileComplaint()
    {

        $this->validate();

        $user = auth()->user();

        $path = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');


        \App\Models\Complaint::create([
            'user_id' => auth()->user()->id,
            'complainant' => $this->complainant,
            'complainee' => $this->complainee,
            'img' => $path,
            'description' => $this->description,
            'submit_date_com' => $this->date,
            'submit_clock_com' => $this->clock
        ]);

        $this->reset([]);

    }
}; ?>

<div>


    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ثبت شکایت</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="fileComplaint">

                                <input wire:model.fill="date" value="{{ jdate('Y/m/d') }}" disabled hidden>
                                <input wire:model.fill="clock" value="{{ jdate('H:i:s') }}" disabled hidden>
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">شاکی</label>
                                            <input wire:model="complainant" required id="con-name" name="name" type="text" class="form-control" placeholder="علی علوی">
                                            @error('complainant')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">متشکی</label>
                                                <input wire:model="complainee" required id="con-name" name="name"
                                                       type="text" class="form-control" placeholder="امین امینی">
                                                @error('complainee')
                                                <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">عکس</label>
                                                <input class="form-control" type="file" wire:model="image" placeholder="عنوان">
                                                @error('image')
                                                <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                                @enderror
                                                <br>
                                                @if ($this->image)
                                                    <img src="{{ $this->image->temporaryUrl() }}" class="w-40 h-40" alt="{{ $this->image->getClientOriginalName() }}">
                                                @endif
                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">توضیحات</label>
                                            <textarea wire:model="description" class="form-control" rows="3" placeholder="توضیح مختصری را درباره شکایت بنویسید..."></textarea>
                                            @error('description')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <button class="btn btn-primary w-100" type="submit">ثبت شکایت</button>
                                        <hr>
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>
            </div>
        </div>
    </section>




</div>
