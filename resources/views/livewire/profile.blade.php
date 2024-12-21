<div>



    <section class="py-4">
        <div class="container">

            <div class="row g-4">
                <!-- Profile cover and info START -->
                <div class="col-12">
                    <div class="card mb-4 position-relative z-index-9">
                        <!-- Cover image -->
                        </div>
                        <div class="card-body pt-3 pb-0">
                            <div class="row d-flex justify-content-between">
                                <!-- Avatar -->
                                <div class="col-sm-12 col-md-auto text-center text-md-start">
                                    <div class="avatar avatar-xxl mt-n5">
                                        <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ asset('storage/'.$find_user_id->image_profile) }}"
                                             alt="">
                                    </div>
                                </div>
                                <!-- Profile info -->
                                <div class="col-sm-12 col-md text-center text-md-start d-md-flex justify-content-between align-items-center">
                                    <div>
                                        <h4 class="my-1">{{ $find_user_id->username }}<i class="bi bi-patch-check-fill text-info small"></i></h4>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="bi bi-person-fill me-1"></i>{{ $find_user_id->role }}</li>
                                        </ul>
                                        <p class="m-0"></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Profile info END -->
            </div>

        <br>

            <div class="row g-4 mx-auto">
                <!-- Left sidebar START -->
                <div class="col-lg-12 col-xxl-12">
                    <form wire:submit="create({{ auth()->user()->id }})">
                        <!-- Profile START -->
                        <div class="card border mb-4">
                            <div class="card-header border-bottom p-3">
                                <h4 class="card-header-title mb-0">حساب کاربری</h4>
                            </div>
                            <div class="card-body">
                                <!-- Full name -->
                                <div class="mb-3">
                                    <label class="form-label">نام کامل</label>
                                    <div class="input-group">
                                        <input type="text" wire:model.fill="f_name" class="form-control" value="{{ $find_user_id->f_name }}" placeholder="نام">
                                        <input type="text" wire:model.fill="l_name" class="form-control" value="{{ $find_user_id->l_name }}" placeholder="نام خانوادگی">
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label class="form-label">ایمل</label>
                                    <div class="input-group">
                                        <input type="email" wire:model.fill="email" class="form-control" value="{{ $find_user_id->email }}" placeholder="alialavi1123@gmail.com">
                                    </div>
                                </div>

                                <!-- N-Code -->
                                <div class="mb-3">
                                    <label class="form-label">کدملی</label>
                                    <div class="input-group">
                                        <input type="text" wire:model.fill="n_code" class="form-control" value="{{ $find_user_id->n_code }}" placeholder="کدملی">
                                    </div>
                                </div>
                                <!-- Mobile -->
                                <div class="mb-3">
                                    <label class="form-label">شماره تماس</label>
                                    <div class="input-group">
                                        <input type="tel" wire:model.fill="mobile" class="form-control" value="{{ $find_user_id->mobile }}" placeholder="شماره تماس">
                                    </div>
                                </div>

                                <!-- office_number -->
                                <div class="mb-3">
                                    <label class="form-label">تلفن دفتر کار</label>
                                    <div class="input-group">
                                        <input type="tel" wire:model.fill="office_phone" class="form-control" value="{{ $find_user_id->office_phone }}" placeholder="تلفن دفتر کار">
                                    </div>
                                </div>

                                <!-- lw_license_number -->
                                <div class="mb-3">
                                    <label class="form-label">شماره پروانه وکالت</label>
                                    <div class="input-group">
                                        <input type="tel" wire:model.fill="lw_license_number" class="form-control" value="{{ $find_user_id->lw_license_number }}" placeholder="شماره پروانه وکالت">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">وضعیت اشتغال</label>
                                    <div class="input-group">
                                        <select class="form-select" wire:model.fill="status_work">
                                            <option value="بیکار">بیکار</option>
                                            <option value="مشغول به کار">مشغول به کار</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">جنسیت</label>
                                    <div class="input-group">
                                        <select class="form-select" wire:model.fill="gender">
                                            <option>جنسیت</option>
                                            <option value="آقای">آقا</option>
                                            <option value="سرکار خانم">خانم</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">محل اشتغال</label>
                                    <div class="input-group">
                                        <input wire:model.fill="city_of_work" class="form-control" value="{{ $find_user_id->city_of_work }}" placeholder="شهر محل اشتغال">
                                    </div>
                                </div>
                                <!-- Profile picture -->
                                <div class="mb-3">
                                    <label class="form-label">تصویر پروفایل</label>
                                    <!-- Avatar upload START -->
                                    <div class="d-flex align-items-center">
                                        <div class="position-relative me-3">
                                            <!-- Avatar edit -->
                                            <div class="position-absolute top-0 end-0  z-index-9">
                                                <a class="btn btn-sm btn-light btn-round mb-0 mt-n1 me-n1"
                                                   href="{{ \Illuminate\Support\Facades\URL::signedRoute('test_img', ['user_id' => auth()->user()->id]) }}"> <i class="bi bi-pencil"></i> </a>
                                            </div>
                                            <!-- Avatar preview -->
                                            <div class="avatar avatar-xl">
                                                <img class="avatar-img rounded-circle border border-white border-3 shadow" src="{{ asset('storage/'.$find_user_id->image_profile) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Avatar upload END -->
                                </div>
                                <!-- Bio -->
                                <div class="mb-3">
                                    <label class="form-label">آدرس</label>
                                    <textarea wire:model.fill="address" class="form-control" rows="3">{{ $find_user_id->address }}</textarea>
                                </div>
                                <!-- Birthday -->
                                <div>
                                    <label class="form-label">تاریخ تولد</label>
                                    <input type="text" wire:model.fill="date_of_brith" class="form-control flatpickr-input" placeholder="DD/MM/YYYY" value="{{ $find_user_id->date_of_brith }}">
                                </div>
                                <!-- Save button -->
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">ذخیره</button>
                                    @if($alert_mode == 0)
                                    @elseif($alert_mode == 1)
                                        <div wire:click="close_alert" style="cursor: pointer" class="alert alert-success m-3">
                                            بروز رسانی شد!
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- Profile END -->
                    </form>
                </div>
            </div>
    </section>
</div>
