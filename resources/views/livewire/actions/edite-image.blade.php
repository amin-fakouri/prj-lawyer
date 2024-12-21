<?php

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rules\File;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {

    use WithFileUploads;

    public $find_post;

    public function mount($post_id)
    {
        $this->find_post = \App\Models\Post::find($post_id);
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
    public $image, $image_2;

    public function update($id)
    {

        $this->validate();

        $path = $this->image->storeAs('images', $this->image->getClientOriginalName(), 'public');
        \App\Models\Post::find($id)->update([
            'image_url' => $path
        ]);

        $this->reset();

        return redirect(\Illuminate\Support\Facades\URL::signedRoute('edite-image', ['post_id' => $id]));

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
                            <form wire:submit="update({{ $find_post->id }})">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عکس کنونی</label>
                                            <br>
                                            <img src="{{ asset('storage/'.$find_post['image_url']) }}" class="w-80 h-50 rounded">
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
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard')}}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'lawyer')
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard-dashboard')}}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت

                                    @elseif(auth()->user()->role == 'trainee')
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard')}}"
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
