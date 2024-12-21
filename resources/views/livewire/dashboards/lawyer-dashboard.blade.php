<div>

    <header class="navbar-light navbar-sticky header-static border-bottom navbar-dashboard">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl" style="background-color: #02085b;">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand me-3" href="{{ route('lawyer-dashboard') }}" wire:navigate>
                    <img style="width: 220px; height: 80px;" class="navbar-brand-item light-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
                    <img style="width: 220px; height: 80px;" class="navbar-brand-item dark-mode-item" src="{{ asset('bg_lw/logo2.png') }}" alt="logo">
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
                        <li class="nav-item"><a style="font-size: 12px;color: #ffffff;background-color: #060c59"
                                                class="nav-link" href="{{ route('welcome') }}"><i
                                    class="bi bi-house-door me-1"></i>پیشخوان</a></li>

                        <!-- Nav item 2 Post -->

                        <!-- Nav item 3 Pages -->
                        <li class="nav-item dropdown">
                            <a style="font-size: 12px;color: #ffffff;background-color: #060c59"
                               class="nav-link dropdown-toggle" href="#" id="postMenu" data-bs-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false"><i class="bi bi-pencil me-1"></i>صفحات</a>                            <ul class="dropdown-menu" aria-labelledby="pagesMenu">

                                <li> <a class="dropdown-item" href="{{ route('create-complaint') }}" wire:navigate>{{__('ایجاد شکایات')}}</a></li>
                                <li> <a class="dropdown-item"
                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('update-password', ['user_id' => \auth()->user()->id]) }}">
                                        {{__('تغیر گذرواژه')}}
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
                            <li><a class="dropdown-item" style="font-size: 12px;color: #098c00;"
                                   href="{{ \Illuminate\Support\Facades\URL::signedRoute('profile', ['user_id' => \auth()->user()->id]) }}" wire:navigate
                                ><i class="bi bi-person fa-fw me-2"></i>ویرایش</a></li>
                            <li><a style="font-size: 12px;color: #cd2121;"  wire:click="logout"  class="dropdown-item cursor-pointer">
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





    <section class="py-4">
        <div class="container">
            <div class="row g-5">

                <div class="col-12">
                    <!-- Counter START -->
                    <div class="row g-4">


                        <!-- Counter item -->
                        <div class="col-sm-6 col-lg-12">
                            <div class="card card-body border p-3">
                                <div class="d-flex align-items-center">
                                    <!-- Icon -->
                                    <div class="icon-xl mx-auto fs-1 bg-primary bg-opacity-10 rounded-3 text-primary">
                                        <i class="bi bi-file-earmark-text-fill"></i>
                                    </div>
                                    <!-- Content -->
                                </div>
                                <hr>
                                <a href="{{ route('create-complaint') }}" class="btn btn-primary w-full rounded-3" wire:navigate>ایجاد شکایت</a>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
