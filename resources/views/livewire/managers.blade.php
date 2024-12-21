
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

    <!-- Offcanvas START -->

    <!-- Offcanvas END -->

    <!-- =======================
    Header START -->

        <!-- =======================
        Header END -->

        <section class="pt-3 pt-lg-5">
            <div class="container">
                <div class="row">
                    <!-- Title -->
                    <div class="mb-4">
                        <h2 style="color: #091080;font-weight: bold" class="m-0"> هیات مدیره </h2>
                        <hr style="width: 30%">
                        <h5 style="color: #000000;font-weight: bold" class=" m-0">جستجو خبر</h5>
                    </div>

                    <!-- Main part START -->
                    <div class="col-xl-9 mx-auto">

                        <!-- Search filter START -->
                        <form class="row g-2 g-xl-4 mb-4">
                            <!-- Search -->
                            <div class="col-xl-12">
                                <div class="rounded position-relative">
                                    @if($table_sort == 0)
                                        <input class="form-control pe-5" wire:model.live="search" type="search"
                                               placeholder="عنوان جستجو ..." aria-label="Search">
                                        <button
                                            class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y"
                                            type="submit"><i class="bi bi-search fs-5"> </i></button>
                                    @elseif($table_sort == 1)

                                    @endif
                                </div>

                                <hr>

                                @if($table_sort == 0)
                                    <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px"
                                            type="button" wire:click="sort">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>

                                    <h4 style="color: black;font-weight: bold">جدید ترین</h4>
                                @elseif($table_sort == 1)
                                    <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px"
                                            type="button" wire:click="default">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
                                    <hr>
                                    <h4>قدیمی ترین</h4>
                                @endif
                            </div>
                        </form>
                        <!-- Search filter END -->

                        <!-- Product START -->
                        <div class="row g-4">

                            @if($table_sort == 0)
                                @foreach($managers as $manager)
                                    @if($manager->koms == 2)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="card border p-3 h-100">
                                                <div class="position-relative">
                                                    <!-- Image -->
                                                    <a href="shop-detail.html" class="position-relative z-index-9"><img
                                                            class="card-img" src="{{ asset('storage/'.$manager->image_url) }}"
                                                            alt=""></a>
                                                </div>

                                                <!-- Card body -->
                                                <div class="card-body text-center p-3 px-0">

                                                    <h5 class="card-title" style="color: #000000;font-weight:bold ;width: 230px; text-overflow: ellipsis"><a href="#">{{ $manager->full_name }}</a>
                                                    </h5>
                                                    <hr>
                                                    <p style="white-space: nowrap; overflow: hidden; width: 100px; text-overflow: ellipsis">{{ $manager->about }}</p>


                                                    <!-- Title -->

                                                </div>

                                                <!-- Card footer -->
                                                <div class="card-footer text-center p-0">
                                                    <!-- Button -->
                                                    <a href="{{ URL::signedRoute('person_mng', ['user_id' => $manager->id]) }}"
                                                       class="btn btn-sm btn-warning mb-0"><i
                                                            class="bi bi-newspaper me-2"></i>دیدن اطلاعات</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                    @endif
                                    <!-- Product item START -->

                                    <!-- Product item END -->
                                @endforeach
                            @elseif($table_sort == 1)
                                @foreach($sort_managers as $sort_manager)

                                    @if($sort_manager->koms == 2)
                                        <div class="col-sm-6 col-md-4">
                                            <div class="card border p-3 h-100">
                                                <div class="position-relative">
                                                    <!-- Image -->
                                                    <a href="shop-detail.html" class="position-relative z-index-9"><img
                                                            class="card-img" src="{{ asset('storage/'.$sort_manager->image_url) }}"
                                                            alt=""></a>
                                                </div>

                                                <!-- Card body -->
                                                <div class="card-body text-center p-3 px-0">

                                                    <h5 class="card-title" style="white-space: nowrap; overflow: hidden; width: 220px; text-overflow: ellipsis"><a href="#">{{ $sort_manager->full_name }}</a>
                                                    </h5>
                                                    <hr>
                                                    <p style="white-space: nowrap; overflow: hidden; width: 100px; text-overflow: ellipsis">{{ $sort_manager->about }}</p>
                                                    <hr>
                                                    <!-- Title -->

                                                </div>

                                                <!-- Card footer -->
                                                <div class="card-footer text-center p-0">
                                                    <!-- Button -->
                                                    <a href="{{ URL::signedRoute('person_mng', ['user_id' => $sort_manager->id]) }}"
                                                       class="btn btn-sm btn-primary-soft mb-0"><i
                                                            class="bi bi-newspaper me-2"></i>دیدن اطلاعات</a>
                                                </div>
                                            </div>
                                        </div>
                                    @else

                                    @endif
                                    <!-- Product item START -->


                                @endforeach
                            @endif


                        </div>
                        <!-- Product END -->

                    </div>
                    <!-- Main part END -->
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

</div>



