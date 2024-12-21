<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;


new
#[Layout('layouts.app')]
class extends Component {

    public $post_id;
    public $post;
    public $name_pages;
    public $rules;

    public function mount($post_id = null)
    {
        $this->post_id = $post_id;
        $this->post = Post::find($this->post_id);
        $this->name_pages = DB::table('page_rules')->orderBy('id', 'desc')->get();

        $this->rules = DB::table('rules')->orderBy('id', 'desc')->get();

    }

    public function logout(Logout $logout): void
    {
        Auth::logout();
        Session::invalidate();
        Session::regenerateToken();
        $this->redirectRoute('welcome');
    }

}; ?>


<div>



    <!-- Offcanvas START -->

    <!-- Offcanvas END -->

    <!-- =======================
    Header START -->
    <header style="background-color: rgb(4,12,107); margin-top: -10px" class="navbar-light navbar-sticky header-static">
        <div class="navbar-top d-none d-lg-block small">
            <div class="container">
                <div class="d-md-flex justify-content-between align-items-center my-2">
                    <!-- Top bar left -->
                    <ul class="nav">
                        <li class="nav-item">
                            <a  style="color: white" class="nav-link ps-0" href="{{ route('about') }}">درباره ما</a>
                        </li>

                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(auth()->user()->role == "admin")
                                <li class="nav-item">
                                    <a style="color: white" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @elseif(auth()->user()->role == "lawyer")
                                <li class="nav-item">
                                    <a style="color: white" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @elseif(auth()->user()->role == "trainee")
                                <li class="nav-item">
                                    <a style="color: white" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @else

                            @endif
                        @else
                            <li class="nav-item dropdown nav-link" >

                                <button class="btn btn-outline-light text-white pb-2 mt-2 " style="font-size: 10px;background-color: #66c541; border-radius: 8px; width: max-content; height: 30px" >
                                    <a class="pb-1 mt-3 rounded-lg" style="font-size: 12px;color: #070a33; border-radius: 8px; width: max-content; height: 30px" href="{{ route('my_login') }}">ورود</a>
                                </button>
                            </li>
                        @endif



                    </ul>
                    <!-- Top bar right -->
                    <div class="d-flex align-items-center">
                        <!-- Font size accessibility START -->
                        <div class="btn-group me-3" role="group" aria-label="font size changer">
                            <input type="radio" class="btn-check" name="fntradio" id="font-sm">
                            <label class="btn btn-xs btn-outline-light  mb-0" for="font-sm" style="color: white">A-</label>

                            <input type="radio" class="btn-check" name="fntradio" id="font-default" checked>
                            <label class="btn btn-xs btn-outline-light mb-0" for="font-def" style="color: white">A</label>

                            <input type="radio" class="btn-check" name="fntradio" id="font-lg">
                            <label class="btn btn-xs btn-outline-light mb-0" for="font-lg" style="color: white">A+</label>
                        </div>

                        <!-- Dark mode options START -->
                        <!-- Dark mode options END -->
                    </div>
                    <!-- Main navbar END -->
                    <ul class="nav">
                        <li class="nav-item">
                            <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i class="fab fa-facebook-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i class="fab fa-twitter-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i class="fab fa-linkedin"></i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i class="fab fa-youtube-square"></i></a>
                        </li>
                        <li class="nav-item">
                            <a style="color: #ffcc00" class="nav-link ps-2 pe-0 fs-5" href="#"><i class="fab fa-vimeo"></i></a>
                        </li>
                    </ul>

                </div>
                <!-- Divider -->
                <div class="border-bottom border-2 border-primary opacity-8"></div>
            </div>
        </div>

        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-lg" style="background-color: #060e7a" >
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand" href="#">
                    <img style="width: 300px; height: 110px;" class="navbar-brand-item light-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
                    <img style="width: 300px; height: 110px;" class="navbar-brand-item dark-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Responsive navbar toggler -->
                <button style="background-color: #ffffff" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span  class="text-body h6 d-none d-sm-inline-block">منو</span>
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarCollapse" style="background-color: #060e7a" >
                    <ul class="navbar-nav navbar-nav-scroll mx-auto "  >

                        <!-- Nav item 1 Demos -->
                        <li class="nav-item" >
                            <a style="font-size: 12px;font-weight: bold;background-color: #060e7a;color: #ffa600" class="nav-link" href="{{ route('welcome') }}">خانه</a>
                        </li>



                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link  " style="font-size: 12px;background-color: #060e7a;color: #ffffff" href="{{ route('mngs') }}"> هیات مدیره</a>
                        </li>

                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown">
                            <a class="nav-link " style="font-size: 12px;background-color: #060e7a;color: #ffffff" href="{{ route('amour') }}">امور رفاهی </a>
                        </li>

                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown">
                            <a class="nav-link active" style="font-size: 12px;background-color: #060e7a;color: #29dbfa" href="{{ route('amour_trainee') }}">امور کارآموزی</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link " style="font-size: 12px;background-color: #060e7a;color: #ffffff" href="{{ route('submit_mng') }}" id="postMenu">مصوبات هیات مدیره </a>
                        </li>

                        <!-- Nav item 2 Pages -->
                        <li class="nav-item dropdown" >
                            <a style="font-size: 12px;background-color: #060e7a;color: #ffffff" class="nav-link dropdown-toggle " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">قوانین و مقررات</a>
                            <ul class="dropdown-menu border border-white border-opacity-1" aria-labelledby="pagesMenu" style="background-color: #030c52">
                                @foreach($name_pages as $name_page)
                                    <li> <a class="dropdown-item" style="font-size: 12px;color: #ffdd00" href="{{ route('rule_page', ['page_id' => $name_page->id]) }}">{{ $name_page->name_page }}</a></li>
                                @endforeach
                                <!-- Dropdown submenu -->
                            </ul>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="text-white  p-2 rounded-lg" style="background-color: #d30808;font-size: 10px; border-radius: 8px; width: max-content; height: 40px" href="{{ route('auto_misoin') }}" id="postMenu">اتوماسیون اداری</a>
                        </li>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            @if(auth()->user()->role == "admin")
                                <li class="nav-item">
                                    <a class="btn btn-outline-light  m-1 mt-4 p-1" style=";font-size:12px;color: #42e703;border-radius: 8px; width: max-content; height: 30px" href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @elseif(auth()->user()->role == "lawyer")
                                <li class="nav-item">
                                    <a style="color: #42e703" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @elseif(auth()->user()->role == "trainee")
                                <li class="nav-item">
                                    <a style="color: #42e703" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard') }}">صفحه اصلی</a>
                                </li>
                            @else

                            @endif
                        @else
                            <li class="nav-item m-1">
                                {{--                                    <a style="color: white;background-color: yellow ;padding: 1px" class="nav-link" href="{{ route('my_login') }}">ورود</a>--}}
                                <a style="background-color: #06dc19;font-size: 10px" href="{{ route('my_login') }}" class="badge m-4"><i class="fas fa-circle me-2 small fw-bold"></i>ورود</a>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>

    <!-- Post -->
    <div class="pb-10  w-full flex flex-col items-center justify-center space-y-8">
        <article class="flex w-5/6 flex-col items-center justify-center p-5 gap-y-10 rounded-lg ">

            <!-- Image -->
            <div class="flex items-center justify-center self-center w-full">
                <img src="{{ Storage::url($post->image_url) }}" alt="" class="w-full rounded-lg bg-contain bg-no-repeat bg-center bg-origin-content">
            </div>

            <!-- Main -->
            <div class="group w-full relative">

                <!-- Info -->
                <div class="flex w-full justify-between items-center gap-x-4 text-xs">

                    <!-- Title -->
                    <h1 class="cursor-default text-3xl font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                        <a>
                            <span class="absolute inset-0"></span>
                            {{ $post->title }}
                        </a>
                    </h1>

                    <div>
                        <!-- Date -->
                        <time datetime="2020-03-16" class="cursor-default text-gray-500">
                            {{
                                gregorian_to_jalali(gy: $post->value('created_at')->format('Y'),
                                                    gm: $post->value('created_at')->format('m'),
                                                    gd: $post->value('created_at')->format('d'))[2] . ' ' . jdate('F') . ' ' .

                                gregorian_to_jalali(gy: $post->value('created_at')->format('Y'),
                                                    gm: $post->value('created_at')->format('m'),
                                                    gd: $post->value('created_at')->format('d'))[0]
                            }}
                        </time>

                        <!-- Author -->
                        <a class="cursor-default relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100 transition-all">
                            @if($post->user->name)
                                {{ $post->user->name }}
                            @else
                                {{ $post->user->username }}
                            @endif
                            |
                            {{ $post->user->role }}
                        </a>
                    </div>

                </div>

                <!-- Content -->
                <p class="whitespace-pre-line mt-5 text-md leading-6 text-gray-600 break-normal">
                    {{ $post->content }}
                </p>

            </div>

        </article>
    </div>


</div>
