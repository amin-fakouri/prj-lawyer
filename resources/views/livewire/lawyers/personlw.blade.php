

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
                            <a class="nav-link " style="font-size: 9px;background-color: #060e7a;color: #ffffff" href="{{ route('mngs') }}"> هیات مدیره</a>
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
    <!-- =======================
    Header END -->


    <div id="alert_copeled" class="alert alert-success m-3" style="width: max-content; cursor: pointer;
     color: green; display: none" onclick="hid_alert()">
        کپی شد!
    </div>

    <section>
        <div class="container">
            <div class="row g-4 g-lg-0 justify-content-between">
                <!-- Image -->
                <div class="col-lg-5">
                    <div class="row g-2">
                        <div class="col-12">
                            <div class="bg-light rounded-2 glightbox-bg p-4 position-relative">
                                <a href="assets/images/shop/11.png" class="stretched-link cursor-zoom" data-glightbox data-gallery="image-popup">
                                    <img src="{{ asset('storage/'.$find_user_id->image_url) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Detail -->
                <div class="col-lg-6">
                    <!-- Title -->
                    <h1>{{ 'وکیل:'.$find_user_id->gender.' '.$find_user_id->f_name.' '.$find_user_id->l_name }}</h1>
                    <div class="bg-light p-3 rounded-2 mb-4">
                        <div class="row g-2">
                            <!-- List -->
                            <div class="col-sm-6">
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item py-0">
                                        <span><i class="bi bi-card-text m-2"></i>شماره پروانه وکالت:</span>
                                        <span class="h6 mb-0">{{ $find_user_id->lw_license_number }}</span>
                                    </li>
                                    <li class="list-group-item pb-0">
                                        <span><i class="bi bi-phone-fill m-2"></i>تلفن دفتر کار:</span>
                                        <span class="h6 mb-0" id="office_number">{{ $find_user_id->office_phone }}</span>
                                    </li>
                                </ul>
                            </div>
                            <!-- List -->
                            <div class="col-sm-6">
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item py-0">
                                        <span><i class="bi bi-phone-fill m-2"></i>تلفن همراه:</span>
                                        <span id="mobile" class="h6 mb-0">{{ $find_user_id->mobile}}</span>
                                    </li>
                                    <li class="list-group-item pb-0">
                                        <span><i class="bi bi-house m-2"></i>نشانی:</span>
                                        <span class="h6 mb-0">{{ $find_user_id->address }}</span>
                                    </li>
                                </ul>
                            </div>

                            <!-- List -->
                            <div class="col-sm-6">
                                <ul class="list-group list-group-borderless">
                                    <li class="list-group-item py-0">
                                        <span><i class="bi bi-clock-fill m-2"></i>وضعیت اشتغال:</span>
                                        <span class="h6 mb-0">{{ $find_user_id->status_work}}</span>
                                    </li>
                                    <li class="list-group-item pb-0">
                                        <span><i class="bi bi-bank2 m-2"></i>شهر محل اشتغال:</span>
                                        <span class="h6 mb-0">{{ $find_user_id->city_of_work }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- List END -->


                    <h1 id="demo"></h1>

                    <!-- Price and button START -->
                    <div class="row">
                        <!-- Button -->
                        <div class="col-md-12">
                            <a href="#" onclick="get_mobile_number()" class="btn btn-primary mb-0 w-100">کپی شماره تلفن همراه</a>
                            <hr>
                            <a href="#" onclick="get_office_number()" class="btn btn-primary mb-0 w-100">کپی تلفن دفتر کار</a>
                        </div>
                    </div>
                    <!-- Price and button END -->
                </div>
            </div>
        </div>
    </section>

    <script>
        function get_mobile_number(){
           let mobile = document.getElementById('mobile').innerHTML;
           navigator.clipboard.writeText(mobile);
           document.getElementById('alert_copeled').style.display = 'block';
        }

        function get_office_number(){
            let office_number = document.getElementById('office_number');
            navigator.clipboard.writeText(office_number);
            document.getElementById('alert_copeled').style.display = 'block';
        }

        function hid_alert(){
            document.getElementById('alert_copeled').style.display = 'none';
        }
    </script>

</div>
