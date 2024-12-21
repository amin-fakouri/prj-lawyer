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
                        <li class="nav-item" >
                            <a style="font-size: 9px;font-weight: bold;background-color: #060e7a;color: #ffa600" class="nav-link " href="{{ route('welcome') }}">خانه</a>
                        </li>

                        <li class="nav-item dropdown ">
                            <a class="nav-link  " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('post-elec') }}"> اخبار کانون </a>
                        </li>

                        <!-- Nav item 3 Post -->
                        <li class="nav-item dropdown ">
                            <a class="nav-link" style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('mngs') }}"> هیات مدیره</a>
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
                                    <li> <a class="dropdown-item" style="font-size: 12px;color: #ffdd00" href="{{ route('rule_page', ['page_id' => $name_page->id]) }}">{{ $name_page->name_page }}</a></li>
                                @endforeach
                                <!-- Dropdown submenu -->
                            </ul>
                        </li>
                        <li class="nav-item nav-link">
                            <a class="text-white  p-2 rounded-lg" style="background-color: #d30808;font-size: 10px; border-radius: 8px; width: max-content; height: 40px" href="http://109.238.176.72:7773" id="postMenu">اتوماسیون اداری</a>
                        </li>


                    </ul>
                </div>

            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
    {{--    Header END -->--}}



    <!-- =======================
        Inner intro START -->
    <section id="item-1" class="pb-3 pb-lg-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6 mt-4 mt-md-0">

                    <h1 class="display-6">{{ $find_post_id->title}}</h1>
                    <span class="ms-2 small">{{ $find_post_id->submit_date_post }}</span>
                    <p>
                        <span class="dropcap bg-danger bg-opacity-10 text-danger px-2 rounded"></span>{{ $find_post_id->content }}


                </div>
                <div class="col-md-6 position-relative m-5"
                     style="background-image:url({{ asset('storage/'.$find_post_id->image_url) }}); background-position: center bottom;width: 400px ;height: 300px; background-size: cover;">

                    <!-- Card Image overlay -->
                    <h5 class="p-3 pe-4 position-absolute top-0 end-0"><span
                            class="badge text-bg-warning fw-bold rounded-pill">{{ $find_post_id->category }}</span>
                    </h5>
                </div>
            </div>

        </div>
    </section>
    <!-- =======================
    Inner intro END -->

    <!-- =======================
    Main START -->

    <!-- =======================
    Main END -->


    <!-- Divider -->


    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Title -->
                    <div class="mb-4 d-md-flex justify-content-between align-items-center">
                        <h2 style="color: #091080;font-weight: bold" class="m-0"><i class="bi bi-megaphone"></i>
                            اخبار مشابه<br>

                            @switch($find_post_id->box)
                                @case(1)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('all-news') }}">
                                        همه
                                    </a>
                                    @break
                                @case(2)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('all-news') }}">
                                        همه
                                    </a>
                                    @break
                                @case(3)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('see_more') }}">
                                        همه
                                    </a>
                                    @break
                                @case(4)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('see_more') }}">
                                        همه
                                    </a>
                                    @break
                                @case(5)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('amour') }}">
                                        همه
                                    </a>
                                    @break
                                @case(6)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('amour_trainee') }}">
                                        همه
                                    </a>
                                    @break
                                @case(7)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('did_tnk') }}">
                                        همه
                                    </a>
                                    @break
                                @case(8)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('submit_mng') }}">
                                        همه
                                    </a>
                                    @break
                                @case(9)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('koms') }}">
                                        همه
                                    </a>
                                    @break
                                @case(10)
                                    <a class="icon-link link-primary text-primary text-decoration-underline icon-link-hover"
                                       href="{{ route('post-elec') }}">
                                        همه
                                    </a>
                                    @break
                            @endswitch

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
                                @if($post->category == $find_post_id->category)
                                    @php $counter_post_6++; @endphp
                                    @if($counter_post_6 <= 12)
                                        <div class="card">
                                            <!-- Card img -->
                                            <div class="position-relative">
                                                <img class="card-img"
                                                     style=" aspect-ratio: 1.5; object-fit: contain; border-radius: 20px"
                                                     src="{{ asset('storage/'.$post->image_url) }}"
                                                     alt="Card image">
                                                <div
                                                    class="card-img-overlay d-flex align-items-start flex-column p-3">
                                                    <!-- Card overlay Top -->
                                                    <div class="w-100 mb-auto d-flex justify-content-end">
                                                        <div class="text-end ms-auto">
                                                            <!-- Card format icon -->
                                                        </div>
                                                    </div>
                                                    <!-- Card overlay bottom -->
                                                    <div class="w-100 mt-auto">
                                                        <a href="#" class="badge text-bg-warning mb-2"><i
                                                                class="fas fa-circle me-2 small fw-bold"></i>{{ $post->category }}
                                                        </a>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body px-0 pt-3">
                                                <h5 class="card-title"><a
                                                        href="{{ route('post', ['post_id' => $post->id]) }}"
                                                        class="btn-link text-reset"
                                                        style="color: black;font-weight:bold;width: 100px; text-overflow: ellipsis">{{ $post->title }}</a>
                                                </h5>
                                                <!-- Card info -->
                                                <ul class="nav nav-divider align-items-center d-none d-sm-inline-block">
                                                    <li class="nav-item">
                                                        <div class="nav-link">
                                                            <div
                                                                class="d-flex align-items-center position-relative">
                                                                @foreach($users as $user)
                                                                    @if($post->user_id == $user->id)
                                                                        @foreach($users as $user)
                                                                            @if($post->user_id == $user->id)
                                                                                <div class="avatar avatar-xs">
                                                                                    <img
                                                                                        class="avatar-img rounded-circle"
                                                                                        src="{{ asset('storage/'.$user->image_profile) }}"
                                                                                        alt="avatar">
                                                                                </div>
                                                                                <span class="ms-3"><a
                                                                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('test', ['user_id' => $user->id]) }}"
                                                                                        class="stretched-link text-reset btn-link">{{ $user->f_name.','.$user->l_name }}</a></span>
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
                        <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i
                                class="fab fa-facebook-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i
                                class="fab fa-twitter-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i
                                class="fab fa-linkedin"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #ffcc00" class="nav-link px-2 fs-5" href="#"><i
                                class="fab fa-youtube-square"></i></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: #ffcc00" class="nav-link ps-2 pe-0 fs-5" href="#"><i
                                class="fab fa-vimeo"></i></a>
                    </li>
                </ul>
            </div>
            <div class="row pt-3 pb-4">
                <div class="col-md-3 col-lg-3 mb-4">
                    <h3 style="font-size: 13px" class="text-white">سامانه پیامکی:</h3>
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


</div>
