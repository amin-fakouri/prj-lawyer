<div>



    <!-- Offcanvas START -->

    <!-- Offcanvas END -->

    <!-- =======================
    Header START -->
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
                                <a  style="color: white;font-size: 10px" class="nav-link ps-0" href="{{ route('about') }}">درباره ما</a>
                            </li>

                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(auth()->user()->role == "admin")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 9px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}">صفحه اصلی</a>
                                    </li>
                                @elseif(auth()->user()->role == "lawyer")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 9px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}">صفحه اصلی</a>
                                    </li>
                                @elseif(auth()->user()->role == "trainee")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 9px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard') }}">صفحه اصلی</a>
                                    </li>
                                @else

                                @endif
                            @else
                                <li class="nav-item">
                                    <a style="color: white;font-size: 10px" class="nav-link" href="{{ route('my_login') }}">ورود</a>
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
                <div class="container" >
                    <!-- Logo START -->
                    <a class="navbar-brand" href="#" >
                        <img style="width: 220px; height: 80px;" class="navbar-brand-item light-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
                        <img style="width: 220px; height: 80px;" class="navbar-brand-item dark-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
                    </a>
                    <!-- Logo END -->

                    <!-- Responsive navbar toggler -->
                    <button style="background-color: #89e6f6" class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">

                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <!-- Main navbar START -->
                    <div class="collapse navbar-collapse" id="navbarCollapse" style="background-color: #060e7a" >
                        <ul class="navbar-nav navbar-nav-scroll mx-auto "  >

                            <!-- Nav item 1 Demos -->
                            <li class="nav-item active">
                                <a style="font-size: 9px;font-weight: bold;background-color: #060e7a;color: #ffa600" class="nav-link active" href="{{ route('welcome') }}">خانه</a>
                            </li>

                            <li class="nav-item dropdown ">
                                <a class="nav-link  " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('post-elec') }}"> اخبار کانون </a>
                            </li>

                            <!-- Nav item 3 Post -->
                            <li class="nav-item dropdown ">
                                <a class="nav-link  " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('mngs') }}"> هیات مدیره</a>
                            </li>

                            <!-- Nav item 3 Post -->
                            <li class="nav-item dropdown">
                                <a class="nav-link " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('amour') }}">امور رفاهی </a>
                            </li>

                            <!-- Nav item 3 Post -->
                            <li class="nav-item dropdown">
                                <a class="nav-link " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('amour_trainee') }}">امور کارآموزی</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('submit_mng') }}" id="postMenu">مصوبات هیات مدیره </a>
                            </li>

                            <!-- Nav item 2 Pages -->
                            <li class="nav-item dropdown" >
                                <a style="font-size: 9px;background-color: #060e7a;color: #ffffff" class="nav-link dropdown-toggle " href="#" id="pagesMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">قوانین و مقررات</a>
                                <ul class="dropdown-menu border border-white border-opacity-1" aria-labelledby="pagesMenu" style="background-color: #030c52">
                                    @foreach($name_pages as $name_page)
                                        <li> <a class="dropdown-item" style="font-size: 10px;color: #ffdd00" href="{{ route('rule_page', ['page_id' => $name_page->id]) }}">{{ $name_page->name_page }}</a></li>
                                    @endforeach
                                    <!-- Dropdown submenu -->
                                </ul>
                            </li>


                            @if($modal_mode == 0)
                                <li class="nav-item dropdown nav-link" >

                                    <button class="btn btn-outline-light text-white p-2 m-1" style="font-size: 10px;;background-color: #d30808; border-radius: 8px; width: max-content; height: 30px" wire:click="open_modal">
                                        <a class="  rounded-lg " style="font-size: 9px;color: #ffffff; border-radius: 8px; width: max-content; height: 30px" href="#" id="postMenu">جستجو وکیل/کارآموز </a>

                                        <i class="bi bi-search"></i>

                                    </button>
                                </li>
                            @elseif($modal_mode == 1)
                                <li class="nav-item dropdown nav-link">
                                    <button class="btn btn-outline-black text-white" style="font-size: 10px; border-radius: 8px; width: max-content; height: 40px" wire:click="close_modal">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </li>
                            @endif
                            @if(\Illuminate\Support\Facades\Auth::check())
                                @if(auth()->user()->role == "admin")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 10px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}">صفحه اصلی</a>
                                    </li>
                                @elseif(auth()->user()->role == "lawyer")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 10px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}">صفحه اصلی</a>
                                    </li>
                                @elseif(auth()->user()->role == "trainee")
                                    <li class="nav-item">
                                        <a style="color: white;font-size: 10px" class="nav-link" href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard') }}">صفحه اصلی</a>
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
        <!-- =======================
        Header END -->







        <!-- =======================
        Header END -->


    @if($modal_mode == 0)
        <main style="background-color: #f2fafc">

            <!-- =======================
            Trending START -->
            <section class="py-2">
                <div class="container">
                    <div class="row g-0">
                        <div class="col-12 bg-primary bg-opacity-10 p-1 rounded border border-opacity-1 border-black " >
                            <div class="d-sm-flex align-items-center text-center text-sm-start">
                                <!-- Title -->
                                <div class="me-3 ">
                                    <span style="background-color: #be0707" class="badge  p-2 px-3">اخبار ویژه:</span>
                                </div>


                                <div class="tiny-slider m-1 col-11 arrow-end arrow-xs arrow-white arrow-round arrow-md-none" style="color: #060f85;font-size: 12px;">

                                    <div class="tiny-slider-inner"
                                         data-autoplay="true"
                                         data-hoverpause="true"
                                         data-gutter="0"
                                         data-arrow="true"
                                         data-dots="false"
                                         data-items="1">
                                        <!-- Slider items -->
                                        @foreach($posts as $post)
                                            @if($post->box == "1")
                                                <div> <a  href="{{ route('post', ['post_id' => $post->id]) }}" class="text-reset btn-link">{{ $post->title }}</a></div>
                                            @endif
                                        @endforeach



                                    </div>

                                </div>

                                <!-- Slider -->

                            </div>
                        </div>
                    </div> <!-- Row END -->
                </div>
            </section>
            <!-- =======================
            Trending END -->

            <!-- =======================
            Main hero START -->
            <section class="pt-4 pb-0 card-grid">
                <div class="container">
                    <div class="row g-4">

                        @php $counter_post_1=0; @endphp
                        @foreach($posts as $post)
                            @if($post->box == 2)
                                @php $counter_post_1++; @endphp
                                @if($counter_post_1 == 1)
                                    <div class="col-lg-6">
                                        <div class="card card-overlay-bottom card-grid-lg card-bg-scale" style="background-image: url({{ asset('storage/'.$post->image_url) }}); background-position: center left; background-size: cover;">
                                            <!-- Card featured -->
                                            <span class="card-featured" title=""><i class="fas fa-star"></i></span>
                                            <!-- Card Image overlay -->
                                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                                <div class="w-100 mt-auto">
                                                    <!-- Card category -->
                                                    <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>
                                                    <!-- Card title -->
                                                    <h2 style="color: black;font-weight:bold;" class="text-white h1"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link stretched-link text-reset">{{ $post->title }}</a></h2>
                                                    <p class="text-white" style="white-space: nowrap; width: 500px; overflow: hidden; text-overflow: ellipsis">{{ $post->content }}</p>
                                                    <!-- Card info -->
                                                    <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                        <li class="nav-item">
                                                            <div class="nav-link">
                                                                @foreach($users as $user)
                                                                    @if($post->user_id == $user->id)
                                                                        <div
                                                                            class="d-flex align-items-center text-white position-relative">
                                                                            <div class="avatar avatar-sm">
                                                                                <img class="avatar-img rounded-circle"
                                                                                     src="{{ asset('storage/'.$user->image_profile) }}"
                                                                                     alt="avatar">
                                                                            </div>

                                                                            <span class="ms-3"><a
                                                                                    href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}"
                                                                                    class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></span>

                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </li>
                                                        <li class="nav-item">{{ $post->submit_date_post }}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                @endif
                            @else
                            @endif
                        @endforeach
                        <!-- Left big card -->


                        <!-- Right small cards -->
                        <div class="col-lg-6">
                            <div class="row g-4">
                                <!-- Card item START -->
                                @php $counter_post_2=0; @endphp
                                @foreach($posts as $post)
                                    @if($post->box == 2)
                                        @php $counter_post_2++; @endphp
                                        @if($counter_post_2 == 2)
                                            <div class="col-12">
                                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image: url({{ asset('storage/'.$post->image_url) }}); background-position: center left; background-size: cover;">
                                                    <!-- Card Image -->
                                                    <!-- Card Image overlay -->
                                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                                        <div class="w-100 mt-auto">
                                                            <!-- Card category -->
                                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>

                                                            <!-- Card title -->
                                                            <h4 style="color: black;font-weight:bold;"  class="text-white"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link stretched-link text-reset">{{ $post->title }}</a></h4>
                                                            <!-- Card info -->
                                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                                <li class="nav-item position-relative">
                                                                    @foreach($users as $user)
                                                                        @if($post->user_id == $user->id)
                                                                            <div class="nav-link"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}" class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></div>
                                                                        @endif
                                                                    @endforeach
                                                                </li>
                                                                <li class="nav-item">{{ $post->submit_date_post }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                                <!-- Card item END -->

                                <!-- Card item START -->
                                @php $counter_post_3=0; @endphp
                                @foreach($posts as $post)
                                    @if($post->box == 2)
                                        @php $counter_post_3++; @endphp
                                        @if($counter_post_3 == 3)
                                            <div class="col-md-6">
                                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image: url({{ asset('storage/'.$post->image_url) }}); background-position: center left; background-size: cover;">
                                                    <!-- Card Image overlay -->
                                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                                        <div class="w-100 mt-auto">
                                                            <!-- Card category -->
                                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>
                                                            <!-- Card title -->
                                                            <h4 style="color: black;font-weight:bold;" class="text-white"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link stretched-link text-reset">{{ $post->title }}</a></h4>
                                                            <!-- Card info -->
                                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                                <li class="nav-item position-relative">
                                                                    @foreach($users as $user)
                                                                        @if($post->user_id == $user->id)
                                                                            <div class="nav-link"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}" class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></div>
                                                                        @endif
                                                                    @endforeach
                                                                </li>
                                                                <li class="nav-item">{{ $post->submit_date_post }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                                <!-- Card item START -->
                                @php $counter_post_4=0; @endphp
                                @foreach($posts as $post)

                                    @if($post->box == 2)
                                        @php $counter_post_4++; @endphp
                                        @if($counter_post_4 == 4)
                                            <div class="col-md-6">
                                                <div class="card card-overlay-bottom card-grid-sm card-bg-scale" style="background-image: url({{ asset('storage/'.$post->image_url) }}); background-position: center left; background-size: cover;">
                                                    <!-- Card Image overlay -->
                                                    <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                                        <div class="w-100 mt-auto">
                                                            <!-- Card category -->
                                                            <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>

                                                            <!-- Card title -->
                                                            <h4 style="color: black;font-weight:bold;" class="text-white"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link stretched-link text-reset">{{ $post->title }}</a></h4>
                                                            <!-- Card info -->
                                                            <ul class="nav nav-divider text-white-force align-items-center d-none d-sm-inline-block">
                                                                <li class="nav-item position-relative">
                                                                    @foreach($users as $user)
                                                                        @if($post->user_id == $user->id)
                                                                            <div class="nav-link"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}" class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></div>
                                                                        @endif
                                                                    @endforeach
                                                                </li>
                                                                <li class="nav-item">{{ $post->submit_date_post }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                        @endif
                                    @else
                                    @endif
                                @endforeach
                                <!-- Card item END -->
                                <!-- Card item START -->

                                <!-- Card item END -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- =======================
            Main hero END -->

            <!-- =======================
            Main content START -->
            <section class="position-relative">
                <div class="container" data-sticky-container>
                    <div class="row">
                        <!-- Main Post START -->
                        <div class="col-lg-9">
                            <!-- Title -->
                            <div class="mb-4">
                                <h2 style="color: #091080;font-weight: bold" class="m-0"><i class="bi bi-hourglass-top me-2"></i>سایر اخبار</h2>
                                <p style="font-weight: bold;color: black">آخرین اخبار، و گزارش های ویژه</p>
                            </div>
                            <div class="row gy-4">
                                <!-- Card item START -->

                                @php $counter_post_5=0; @endphp
                                @foreach($posts as $post)
                                    @if($post->box == 3)
                                        @php $counter_post_5++; @endphp
                                        @if($counter_post_5 <= 6)
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <!-- Card img -->
                                                    <div class="position-relative">
                                                        <img class="card-img" src="{{ asset('storage/'.$post->image_url) }}" alt="Card image"
                                                             style="object-fit: contain; aspect-ratio: 1.5; border-radius: 20px">
                                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                            <!-- Card overlay bottom -->
                                                            <div class="w-100 mt-auto">
                                                                <!-- Card category -->
                                                                <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body px-0 pt-3">
                                                        <h4 class="card-title mt-2"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link text-reset" style="color: black;font-weight:bold;width: 230px; text-overflow: ellipsis">{{ $post->title }}</a></h4>
                                                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; width: 300px">{{ $post->content }}</p>
                                                        <!-- Card info -->
                                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                            <li class="nav-item">
                                                                <div class="nav-link">
                                                                    <div class="d-flex align-items-center position-relative">

                                                                        @foreach($users as $user)
                                                                            @if($post->user_id == $user->id)
                                                                                <div class="avatar avatar-xs">
                                                                                    <img class="avatar-img rounded-circle" src="{{ asset('storage/'.$user->image_profile) }}" alt="avatar">
                                                                                </div>
                                                                                <span class="ms-3"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}" class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></span>                                                                        @endif
                                                                        @endforeach

                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li style="color: black;font-size: 12px" class="nav-item">{{ $post->submit_date_post }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @else

                                        @endif


                                    @endif
                                @endforeach





                                <!-- Card item END -->
                                <!-- Load more START -->
                                <div class="col-12 text-center mt-5">
                                    <a style="color: #091080;font-weight: bold;" href="{{ route('see_more') }}" class="btn btn-primary-soft">مشاهده بیشتر <i class="bi bi-arrow-down-circle ms-2 align-middle"></i></a>
                                </div>
                                <!-- Load more END -->
                            </div>

                        </div>




                        <div class="col-lg-3 mt-5 mt-lg-0">
                            <div data-sticky data-margin-top="80" data-sticky-for="767">

                                <div
                                    class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded"
                                    style="background-image:url({{ asset('bg_lw/t4.png') }}); background-position: center left; background-size: cover;width: 270px; height: 120px">
                                    <div class="bg-dark-overlay-1 p-4 ">
                                        <a  href="http://109.238.176.72:7773" style="color: #ffffff;font-weight: bolder;"
                                           class="stretched-link btn-link h1">خدمات الکترونیک</a>
                                    </div>
                                </div>

                                <!-- Trending topics widget START -->
                                <div>
                                    <h4 style="color: #091080;font-weight: bold" class="mt-4 mb-3">دسته بندی عناوین</h4>
                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({{ asset('bg_lw/2.png') }}); background-position: center left; background-size: cover;">
                                        <div class="p-3">
                                            <a href="{{ route('amour') }}" class="stretched-link btn-link text-white h5">
                                               امور رفاهی
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({{ asset('bg_lw/tr_lw.webp') }}); background-position: center left; background-size: cover;">
                                        <div class="p-3">
                                            <a href="{{ route('post-elec') }}" class="stretched-link btn-link text-white h5">
                                                 اخبار کانون
                                            </a>
                                        </div>
                                    </div>
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ asset('bg_lw/8.png') }}); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="{{ route('mngs') }}" class="stretched-link btn-link text-white h5">هیات مدیره</a>
                                        </div>
                                    </div>
                                    <!-- Category item -->

                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ asset('bg_lw/3.png') }}); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="{{ route('amour_trainee') }}" class="stretched-link btn-link text-white h5">امور کارآموزان</a>
                                        </div>
                                    </div>

                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ asset('bg_lw/5.png') }}); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="{{ route('submit_mng') }}" class="stretched-link btn-link text-white h5">مصوبات هیات مدیره</a>
                                        </div>
                                    </div>




                                    <!-- Category item -->
                                    <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded" style="background-image:url({{ asset('bg_lw/r00.png') }}); background-position: center left; background-size: cover;">
                                        <div class="bg-dark-overlay-4 p-3">
                                            <a href="{{ route('did_tnk') }}" class="stretched-link btn-link text-white h5">تبریک و تسلیت ها</a>
                                        </div>
                                    </div>

                                    {{--                                <!-- Category item -->--}}
                                    {{--                                <div class="text-center mb-3 card-bg-scale position-relative overflow-hidden rounded bg-dark-overlay-4 " style="background-image:url({{ asset('bg_lw/bg_lw.jpg') }}); background-position: center left; background-size: cover;">--}}
                                    {{--                                    <div class="p-3">--}}
                                    {{--                                        <a href="{{ route('sbm_shekayat') }}" class="stretched-link btn-link text-white h5">--}}
                                    {{--                                            ثبت شکایات--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </div>--}}
                                    {{--                                </div>--}}

                                    <br><br><br><br><br>
                                </div>
                            </div>
                            <!-- Sidebar END -->
                        </div> <!-- Row end -->
                    </div>
                </div>
            </section>
            <!-- =======================
            Main content END -->
            <section class="pt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="card bg-dark-overlay-3 overflow-hidden card-bg-scale h-200  text-center"
                                 style="background-image:url({{ asset('bg_lw/blog5.png') }}); background-position: center left; background-size: cover;">
                                <!-- Card Image overlay -->
                                <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                    <div class="w-100 my-auto">
                                        <a style="font-size: 25px;font-weight: bold" href="#"
                                           class="stretched-link btn-link text-white h5"> سامانه آموزش مجازی</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!-- Divider -->
            <div class="container"><div class="border-bottom border-primary border-2 opacity-1"></div></div>

            <!-- =======================
            Section START -->
            <section class="pt-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Title -->
                            <div class="mb-4 d-md-flex justify-content-between align-items-center">
                                <h2 style="color: #091080;font-weight: bold;font-size: 18px" class="m-0"><i class="bi bi-megaphone"></i> گالری فیلم و عکس <br>
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover" href="{{ route('photo_gallery') }}">
                                        همه
                                    </a>
                                </h2>
                            </div>
                            <div class="tiny-slider arrow-hover arrow-blur arrow-dark arrow-round">
                                <div class="tiny-slider-inner"
                                     data-autoplay="true"
                                     data-hoverpause="true"
                                     data-gutter="24"
                                     data-arrow="true"
                                     data-dots="false"
                                     data-items-xl="4"
                                     data-items-md="3"
                                     data-items-sm="2"
                                     data-items-xs="1">

                                    @php $counter_post_6=0; @endphp
                                    @foreach($posts as $post)
                                        @if($post->box == 4)
                                            @php $counter_post_6++; @endphp
                                            @if($counter_post_6 <= 12)
                                                <div class="card">
                                                    <!-- Card img -->
                                                    <div class="position-relative">
                                                        <img class="card-img" style=" aspect-ratio: 1.5; object-fit: contain; border-radius: 20px" src="{{ asset('storage/'.$post->image_url) }}" alt="Card image">
                                                        <div class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                            <!-- Card overlay Top -->
                                                            <div class="w-100 mb-auto d-flex justify-content-end">
                                                                <div class="text-end ms-auto">
                                                                    <!-- Card format icon -->
                                                                </div>
                                                            </div>
                                                            <!-- Card overlay bottom -->
                                                            <div class="w-100 mt-auto">
                                                                <a href="#" class="badge text-bg-warning mb-2"><i class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="card-body px-0 pt-3">
                                                        <h5 class="card-title"><a href="{{ route('post', ['post_id' => $post->id]) }}" class="btn-link text-reset"
                                                                                   style="color: black;font-weight:bold;width: 230px; text-overflow: ellipsis">{{ $post->title }}</a></h5>
                                                        <!-- Card info -->
                                                        <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                            <li class="nav-item">
                                                                <div class="nav-link">
                                                                    <div class="d-flex align-items-center position-relative">
                                                                        @foreach($users as $user)
                                                                            @if($post->user_id == $user->id)
                                                                                @foreach($users as $user)
                                                                                    @if($post->user_id == $user->id)
                                                                                        <div class="avatar avatar-xs">

                                                                                            <img class="avatar-img rounded-circle" src="{{ asset('storage/'.$user->image_profile) }}" alt="avatar">
                                                                                        </div>
                                                                                        <span class="ms-3"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('person_mng', ['user_id' => $user->id]) }}" class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></span>
                                                                                    @endif
                                                                                @endforeach
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="nav-item">{{ $post->submit_date_post }}</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                    <!-- Card item START -->




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- =======================
            Section END -->

        </main>
        <!-- **************** MAIN CONTENT END **************** -->

        <!-- =======================
        Footer START -->
        <footer style="background-color: #040956" class="pt-5">
            <div class="container">
                <!-- About and Newsletter START -->
                <div class="row pt-3 pb-4">
                    <div class="col-md-3 pt-1 ">
                        <img width="250px" height="90px" src="{{ asset('bg_lw/logo2.png') }}" alt="footer logo">
                    </div>
                    <hr>
                    <ul dir="ltr" class="nav">
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
                    <div class="row pt-3 pb-4">
                        <div class="col-md-3 col-lg-3 mb-4">
                            <h3  style="font-size: 13px" class="text-white">سامانه پیامکی:</h3>
                            <p class="text-body-secondary">65454455</p>
                            <p class="text-body-secondary">6545689754455</p>
                        </div>
                        <div class="col-md-3">
                            <h3 style="font-size: 13px" class="text-white">تلفکس:</h3>
                            <p class="text-body-secondary">09172384175</p>
                            <p class="text-body-secondary">09172384175</p>
                        </div>
                        <div class="col-md-3 col-lg-3 mb-4">
                            <h3 style="font-size: 13px" class="text-white">پست الکترونیکی:</h3>
                            <p style="font-size: 13px" class="text-body-secondary">nasim@gmail.com</p>
                        </div>
                </div>
                </div>
        </footer>

        <!-- =======================
        Footer END -->

        <!-- Back to top -->
        <div style="color: #030b77;background-color: #3aacdd" class="back-top"><i class="bi bi-arrow-up-short"></i></div>
    @elseif($modal_mode == 1)
        <section class="py-4">
            <div class="container">
                <div class="row pb-4">
                    <div class="col-12">
                        <!-- Title -->
                        <h1 class="mb-0 h3">جستجوی وکیل/کارآموز</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Chart START -->
                        <div class="card border">
                            <!-- Card body -->
                            <div class="card-body">
                                    <!-- Main form -->




                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">جستجوی وکیل/کارآموز</label>
                                                <input class="form-control" wire:model.live="search">

                                            </div>
                                        </div>
                                    </div>

                                <div class="table-responsive border-0">
                                    <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                        <!-- Table head -->
                                        <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="border-0 rounded-start">نام</th>
                                            <th scope="col" class="border-0">نام خانوادگی</th>
                                            <th scope="col" class="border-0">محل اشتغال</th>
                                            <th scope="col" class="border-0 rounded-end">دیدن اطلاعات</th>
                                        </tr>
                                        </thead>


                                        @foreach($users as $user)
                                            @if($user->role == 'lawyer' or $user->role == "trainee" and $user->f_name != "" and $user->l_name != "")
                                                <!-- Table body START -->
                                                <tbody class="border-top-0">
                                                <!-- Table item -->
                                                <tr>

                                                    <td class="mb-0">{{ $user->f_name }}</td>
                                                    <td class="mb-0">{{ $user->l_name }}</td>
                                                    <td class="mb-0">{{ $user->city_of_work }}</td>
                                                    <td class="mb-0"><a href="{{ \Illuminate\Support\Facades\URL::signedRoute('test', ['user_id' => $user->id]) }}">
                                                            دیدن اطلاعات
                                                        </a></td>


                                                </tr>

                                                </tbody>
                                            @endif

                                        @endforeach






                                    </table>
                                </div>




                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <hr>
                                        <button type="button" wire:click="close_modal"
                                           class="btn btn-danger" style="border-radius: 8px">
                                            <i class="bi bi-x"></i>
                                        </button>
                                    </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif




    <!-- **************** MAIN CONTENT START **************** -->

</div>
