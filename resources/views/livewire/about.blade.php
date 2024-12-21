
<div>

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
                            <a class="nav-link  active" style="font-size: 9px;background-color: #060e7a;color: #29dbfa" href="{{ route('mngs') }}"> هیات مدیره</a>
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

                        <li class="nav-item nav-link">
                            <a class="text-white  p-2 rounded-lg" style="background-color: #d30808;font-size: 10px; border-radius: 8px; width: max-content; height: 40px" href="http://109.238.176.72:7773" id="postMenu">اتوماسیون اداری</a>
                        </li>


                    </ul>
                </div>

            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- =======================
        Inner intro START -->
        <section class="pt-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-dark-overlay-4 overflow-hidden card-bg-scale h-400 text-center" style="background-image:url({{ asset('bg_lw/tr_lw.webp') }}); background-position: center left; background-size: cover;">
                            <!-- Card Image overlay -->
                            <div class="card-img-overlay d-flex align-items-center p-3 p-sm-4">
                                <div class="w-100 my-auto">
                                    <h1 class="text-white display-5">درباره ما</h1>
                                    <!-- breadcrumb -->
                                    <nav class="d-flex justify-content-center" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-dark breadcrumb-dots mb-0">

                                            <li class="breadcrumb-item active">کانون وکلای دادگستری استان بوشهر</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =======================
        Inner intro END -->

        <!-- =======================
        About START -->
        <section class="pt-4 pb-0">
            <div class="container">
                <div class="row">
                    @foreach($abouts as $about)
                         <p>{{ $about->about }}</p>
                    @endforeach
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
        About END -->

    </main>
    <!-- **************** MAIN CONTENT END **************** -->



</div>
