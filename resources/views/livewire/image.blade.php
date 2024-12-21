<?php

use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {

    use WithFileUploads;

    public $find_user_id;

    public function mount($user_id)
    {
        $this->find_user_id = \App\Models\User::find($user_id);
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
                File::image()->min('1kb')->max('7mb')
            ]
        ];
    }

    #[Validate]
    public $image;
    public $find_user_update;

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

        return redirect(\Illuminate\Support\Facades\URL::signedRoute('image-profile', ['user_id' => \auth()->user()->id]));
    }
}; ?>

<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">تغییر عکس</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="update({{ $find_user_id->id }})">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عکس کنونی</label>
                                            <br>
                                            <img src="{{ asset('storage/'.$find_user_id['image_profile']) }}" class="w-80 h-50 rounded">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">نام کاربر</label>
                                            <input class="form-control" wire:model="image" type="file">
                                            @error('image')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            @if ($this->image)
                                                <img src="{{ $this->image->temporaryUrl() }}" class="w-40 h-40" alt="{{ $this->image->getClientOriginalName() }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">ذخیره</button>
                                    <hr>
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('admin-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'lawyer')
                                        <a href="{{ route('lawyer-dashboard-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'trainee')
                                        <a href="{{ route('trainee-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

