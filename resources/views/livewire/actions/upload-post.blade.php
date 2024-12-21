<?php

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

new
#[Layout('layouts.app')]
class extends Component {

    use WithFileUploads;

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

        Post::create([
            'user_id' => \auth()->user()->id,
            'title' => $this->title,
            'image_url' => $path,
            'box' => $this->box,
            'content' => $this->content,
            'category' => $this->category,
            'submit_date_post' => jdate('Y/m/d')
        ]);

        $this->reset();
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }



}; ?>

<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">درج پست</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="createUser">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">بخش</label>
                                            <select wire:model="box" class="form-select">
                                                <option>بخش</option>
                                                <option value="1">اخبار ویژه</option>
                                                <option value="2">جز ۴ پوستر اول</option>
                                                <option value="3">سایر اخبار</option>
                                                <option value="4">گالری فیلم و عکس</option>
                                                <option value="امور رفاهی">امور رفاهی</option>
                                                <option value="امور کارآموزان">امور کارآموزان</option>
                                                <option value="تسلیت ها و تبریک ها">تسلیت ها و تبریک ها</option>
                                                <option value="مصوبات هیات مدیره">مصوبات هیات مدیره</option>
                                                <option value="اخبار کانون">اخبار کانون</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">دسته بندی عناوین</label>
                                            <select wire:model="category" class="form-select">
                                                <option>دسته بندی</option>
                                                <option value="امور رفاهی">امور رفاهی</option>
                                                <option value="امور کارآموزان">امور کارآموزان</option>
                                                <option value="تسلیت ها و تبریک ها">تسلیت ها و تبریک ها</option>
                                                <option value="مصوبات هیات مدیره">مصوبات هیات مدیره</option>
                                                <option value="اخبار کانون">اخبار کانون</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عنوان</label>
                                            <input class="form-control" wire:model="title" placeholder="عنوان">
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

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">محتوا</label>
                                            <textarea wire:model="content" class="form-control"></textarea>
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
                                    <button class="btn btn-primary w-100" type="submit">درج پست</button>
                                    <hr>
                                    <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}"
                                       class="link-underline-primary text-decoration-underline">
                                        برگشت
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>






</div>
