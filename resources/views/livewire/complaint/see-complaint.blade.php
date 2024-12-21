<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">دیدن شکایت</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">شاکی:</label>
                                            <p>
                                                {{ $find_id->complainant }}
                                            </p>
                                        </div>

                                    </div>
                                </div>
                            <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">متشکی</label>
                                            <p>{{ $find_id->complainee }}</p>
                                        </div>

                                    </div>
                                </div>
                            <hr>



                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عکس:</label>
                                            <a class="btn btn-light text-dark btn-round mb-0" data-bs-toggle="tooltip"
                                               data-bs-placement="top" title="برای به وضوح دیدن عکس با کلیک روی آن,آن را دانلود کنید."
                                               href="#">
                                                <i class="bi bi-info-circle"></i>
                                            </a>
                                            <br>
                                            <div class="flex flex-wrap">
                                                <a  href="{{ asset('storage/'.$find_id['img']) }}" download>
                                                    <img src="{{ asset('storage/'.$find_id['img']) }}"
                                                         class="w-80 h-80 rounded">
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">محتوا:</label>
                                            <p>
                                                {{ $find_id->description }}
                                            </p>
                                        </div>

                                    </div>
                                </div>

                            <hr>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">تاریخ ثبت:</label>
                                            <h3>{{ $find_id->submit_date_com }}</h3>
                                        </div>
                                    </div>
                                </div>

                            <hr>



                            <div class="row">
                                <div class="col-12">
                                    <!-- Post name -->
                                    <div class="mb-3">
                                        <label class="form-label">ساعت ثبت:</label>
                                        <h3>{{ $find_id->submit_clock_com }}</h3>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <!-- Post name -->
                                    <div class="mb-3">
                                        <label class="form-label">نام وکیل/کارآموز:</label>
                                        @foreach($users as $user)
                                            @if($find_id->user_id == $user->id)
                                                <p>
                                                    {{ $user->f_name.' '.$user->l_name }}
                                                </p>
                                            @endif
                                        @endforeach
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section></div>
