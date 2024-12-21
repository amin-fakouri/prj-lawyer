<?php

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {

    public $find_post;

    public function mount($post_id)
    {
        $this->find_post = \App\Models\Post::find($post_id);
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
    public $title, $content, $category;

    public function update($id)
    {

        $this->validate();

        \App\Models\Post::find($id)->update([
            'title' => $this->title,
            'content' => $this->content,
            'category' => $this->category,
        ]);
    }


}; ?>

<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ویرایش پست</h1>
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
                                            <label class="form-label">عنوان</label>
                                            <input class="form-control" wire:model.fill="title" value="{{ $find_post['title'] }}">
                                            @error('title')
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
                                            <label class="form-label">دسته بندی عناوین</label>
                                            <select wire:model.fill="category" class="form-select">
                                                <option value="{{ $find_post->category }}" autofocus>{{ $find_post->category }}</option>
                                                <option value="امور رفاهی">امور رفاهی</option>
                                                <option value="امور کارآموزان">امور کارآموزان</option>
                                                <option value="تسلیت ها و تبریک ها">تسلیت ها و تبریک ها</option>
                                                <option value="مصوبات هیات مدیره">مصوبات هیات مدیره</option>
                                                <option value="اخبار کانون">اخبار کانون  </option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">محتوا</label>
                                            <textarea class="form-control" wire:model.fill="content">{{ $find_post['content'] }}</textarea>
                                            @error('content')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">ثبت</button>
                                    <hr>

                                    <br>
                                    <a class="link-underline-primary text-decoration-underline" href="{{ \Illuminate\Support\Facades\URL::signedRoute('edite-image', ['post_id' => $find_post->id]) }}">{{__('تغیر عکس')}}</a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>



</div>
