<?php

use App\Livewire\Actions\Logout;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Complaint;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Livewire\Attributes\{Layout, Title, Validate};
use Livewire\Volt\Component;

new #[\Livewire\Attributes\Layout('layouts.app')] class extends Component {

    public $posts, $complaints, $users, $search_post;
    public ?string $search = '';
    public $sort_table=0;
    public $sort_posts;

    public function mount()
    {
        $this->complaints = Complaint::all();
        $this->users = User::all();
        $this->posts = Post::where('title', 'like', '%'.$this->search.'%')->get();
    }

    #[On('post-created')]
    public function UpdatePost()
    {
        return $this->mount();
    }

    public function logout(Logout $logout): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('welcome');
    }

    public function delete_post($id)
    {
        Post::find($id)->delete();
    }


    public function sort()
    {
        $this->sort_table=1;
        $this->sort_posts = DB::table('posts')->orderBy('id', 'desc')->get();
    }

}; ?>

<div>




    <!-- Preloader END -->
    <!-- =======================
    Header START -->
    <header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand me-3" href="{{ route('admin-dashboard') }}" wire:navigate>
                    <img class="navbar-brand-item light-mode-item" src="assets/images/logo.svg" alt="logo">
                    <img class="navbar-brand-item dark-mode-item" src="assets/images/logo-light.svg" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="text-body h6 d-none d-sm-inline-block">منو</span>
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Main navbar START -->
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll mx-auto">

                        <!-- Nav item 1 Demos -->
                        <li class="nav-item"><a class="nav-link" href="dashboard.html"><i class="bi bi-house-door me-1"></i>پیشخوان</a></li>

                        <!-- Nav item 2 Post -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>اخبار</a>
                            <ul class="dropdown-menu" aria-labelledby="postMenu">
                                <!-- dropdown submenu -->
                                <li> <a class="dropdown-item"
                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('upload-post', ['user_id' => \auth()->user()->id]) }}"
                                    >ایجاد</a> </li>
                            </ul>
                        </li>

                        <!-- Nav item 3 Pages -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-folder me-1"></i>صفحات</a>
                            <ul class="dropdown-menu" aria-labelledby="pagesMenu">
                                <li> <a class="dropdown-item" href="{{ route('users-index') }}" wire:navigate>{{__('لیست کاربران')}}</a></li>
                                <li> <a class="dropdown-item" href="{{ url('/') }}" wire:navigate>{{__('خانه')}}</a></li>
                                <li> <a class="dropdown-item" href="{{ route('show-complaint') }}">{{__('لیست شکایات')}}</a></li>
                                <li> <a class="dropdown-item"
                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('update-password', ['user_id' => \auth()->user()->id]) }}">
                                        {{__('تغیر گذرواژه')}}
                                    </a></li>
                                <li> <a class="dropdown-item"
                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('create-user') }}">
                                        {{__('ایجاد کاربر')}}
                                    </a></li>

                            </ul>
                        </li>
                    </ul>

                </div>
                <!-- Main navbar END -->

                <!-- Nav right START -->
                <div class="nav flex-nowrap align-items-center">


                    <!-- Profile dropdown START -->
                    <div class="nav-item ms-2 ms-md-3 dropdown">
                        <!-- Avatar -->
                        <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="avatar-img rounded-circle" src="{{ asset('storage/'.auth()->user()->image_profile) }}" alt="avatar">
                        </a>

                        <!-- Profile dropdown START -->
                        <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
                            <!-- Profile info -->
                            <li class="px-3">
                                <div class="d-flex align-items-center">
                                    <!-- Avatar -->
                                    <div class="avatar me-3">
                                        <img class="avatar-img rounded-circle shadow" src="{{ asset('storage/'.auth()->user()->image_profile) }}" alt="">
                                    </div>
                                    <div>
                                        <a class="h6 mt-2 mt-sm-0" href="#">{{ auth()->user()->f_name.','.auth()->user()->l_name }}</a>
                                        <p class="small m-0">{{ auth()->user()->role }}</p>
                                    </div>
                                </div>
                                <hr>
                            </li>
                            <!-- Links -->
                            <li><a class="dropdown-item"
                                   href="{{ \Illuminate\Support\Facades\URL::signedRoute('profile', ['user_id' => \auth()->user()->id]) }}" wire:navigate
                                ><i class="bi bi-person fa-fw me-2"></i>ویرایش</a></li>
                            <li><a wire:click="logout"  class="dropdown-item cursor-pointer">
                                    <i class="bi bi-power fa-fw me-2"></i>خروج</a>
                            </li>
                        </ul>
                        <!-- Profile dropdown END -->
                    </div>
                    <!-- Profile dropdown END -->

                    <!-- Nav right END -->
                </div>
            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
    <!-- =======================
    Header END -->
    <!-- =======================
    Header END -->





    @php $counter_post=0; @endphp

    @foreach($posts as $post)
        @php $counter_post++; @endphp
    @endforeach


    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3">لیست اخبار <span class="badge bg-primary bg-opacity-10 text-primary">{{ $counter_post  }}</span></h1>
                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('upload-post', ['user_id' => \auth()->user()->id]) }}"
                           class="btn btn-sm btn-primary mb-0"><i class="fas fa-plus me-2"></i>ثبت خبر جدید</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row g-4 mb-4">

                    </div>
                </div>
            </div>




















                        <div class="col-12">
                            <!-- Blog list table START -->
                            <div class="card border bg-transparent rounded-3">

                                <!-- Card header END -->

                                <!-- Card body START -->
                                <div class="card-body">

                                    <!-- Search and select START -->
                                    <div class="row g-3 align-items-center justify-content-between mb-3">
                                        <!-- Search -->
                                        <div class="col-md-8">
                                            <div class="rounded position-relative">
                                                <input class="form-control pe-5 bg-transparent" type="text" wire:model.live="search" placeholder="جستجو" aria-label="Search">
                                                <button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                                            </div>
                                        </div>

                                        <!-- Select option -->
                                        <div class="col-md-1">
                                            <!-- Short by filter -->
                                            <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px" type="button" wire:click="sort">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                     class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                          d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Search and select END -->

                                    <!-- Blog list table START -->
                                    <div class="table-responsive border-0">
                                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                            <!-- Table head -->
                                            <thead class="table-dark">
                                            <tr>
                                                <th scope="col" class="border-0 rounded-start">عنوان خبر</th>
                                                <th scope="col" class="border-0">نام نویسنده</th>
                                                <th scope="col" class="border-0">تاریخ انتشار</th>
                                                <th scope="col" class="border-0">توضیحات</th>
                                                <th scope="col" class="border-0">{{__('عکس')}}</th>
                                                <th scope="col" class="border-0 rounded-end">عملیات</th>
                                            </tr>
                                            </thead>



                                            @if($sort_table == 0)

                                                @php $counter_row_post=0; @endphp

                                                @foreach($posts as $post)
                                                    @php $counter_row_post++; @endphp

                                                        <!-- Table body START -->
                                                    <tbody class="border-top-0">
                                                    <!-- Table item -->
                                                    <tr>
                                                        <!-- Table data -->
                                                        <td>
                                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $post->title }}</a></h6>
                                                        </td>
                                                        <!-- Table data -->
                                                        @foreach($users as $user)
                                                            @if($post->user_id == $user->id)
                                                                <td>
                                                                    <h6 class="mb-0"><a href="#">{{ $user->username }}</a></h6>
                                                                </td>
                                                            @endif
                                                        @endforeach


                                                        <!-- Table data -->
                                                        <td>{{ $post->submit_date_post }}</td>
                                                        <!-- Table data -->
                                                        <td>
                                                            <a href="#" class="badge text-black mb-2 w-80" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $post->content }}</a>

                                                        </td>
                                                        <!-- Table data -->
                                                        <td>
                                                        <span class="badge bg-opacity-10 mb-2 rounded">
                                                            <img src="{{ asset('storage/images'.$post['image_url']) }}" class="w-60 h-60 rounded">
                                                        </span>
                                                        </td>
                                                        <!-- Table data -->
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <a wire:click="delete_post({{ $post->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                                <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('edite-post', ['post_id' => $post->id]) }}" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                    <!-- Table body END -->

                                                @endforeach

                                            @elseif($sort_table == 1)


                                                @php $counter_row_post=0; @endphp

                                                @foreach($sort_posts as $sort_post)
                                                    @php $counter_row_post++; @endphp

                                                        <!-- Table body START -->
                                                    <tbody class="border-top-0">
                                                    <!-- Table item -->
                                                    <tr>
                                                        <!-- Table data -->
                                                        <td>
                                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $sort_post->title }}</a></h6>
                                                        </td>
                                                        <!-- Table data -->
                                                        @foreach($users as $user)
                                                            @if($sort_post->user_id == $user->id)
                                                                <td>
                                                                    <h6 class="mb-0"><a href="#">{{ $user->username }}</a></h6>
                                                                </td>
                                                            @endif
                                                        @endforeach


                                                        <!-- Table data -->
                                                        <td>{{ $sort_post->submit_date_post }}</td>
                                                        <!-- Table data -->
                                                        <td>
                                                            <a href="#" class="badge text-black mb-2 w-80" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $sort_post->content }}</a>

                                                        </td>
                                                        <!-- Table data -->
                                                        <td>
                                                        <span class="badge bg-opacity-10 mb-2 rounded">
                                                            <img src="{{ asset('storage/'.$sort_post['image_url']) }}" class="w-60 h-60 rounded">
                                                        </span>
                                                        </td>
                                                        <!-- Table data -->
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <a wire:click="delete_post({{ $sort_post->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                                                                <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('edite-post', ['post_id' => $sort_post->id]) }}" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="bi bi-pencil-square"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    </tbody>
                                                    <!-- Table body END -->

                                                @endforeach




                                            @endif


                                        </table>
                                    </div>
                                </div>
                                <!-- Blog list table END -->
                            </div>






                        </div>
                        <!-- Counter END -->













                    </div>
                </div>
            </div>
    </section>






























</div>
