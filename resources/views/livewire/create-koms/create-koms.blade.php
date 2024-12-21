<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ایجاد هیات مدیره/کمیسیون</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="createUser">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">نام کامل</label>
                                            <input class="form-control" wire:model="full_name" placeholder="نام کامل">
                                        </div>

                                    </div>
                                </div>

                                <input wire:model.fill="koms" value="2" hidden disabled>



                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">شماره تماس</label>
                                            <input class="form-control" wire:model="phone_number" placeholder="شماره تماس">
                                            @error('title')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عکس</label>
                                            <input class="form-control" type="file" wire:model="image" placeholder="عنوان">
                                            @error('image')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                            <br>

                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">بیوگرافی</label>
                                            <textarea wire:model="content" class="form-control"></textarea>
                                            @error('content')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">ایجاد</button>
                                    <hr>
                                    <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard')}}"
                                       class="link-underline-primary text-decoration-underline">
                                        برگشت
                                    </a>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <br>


            <div class="card border bg-transparent rounded-3">

                <!-- Card body START -->
                <div class="card-body p-3">

                    <!-- Search and select START -->
                    <div class="row g-3 align-items-center justify-content-between mb-3">
                        <!-- Search -->
                        <div class="col-md-8">
                            <input class="form-control pe-5 bg-transparent" type="text" wire:model.live="search" placeholder="جستجو" aria-label="Search">
                        </div>

                        <!-- Select option -->
                        <div class="col-md-1">
                            <!-- Short by filter -->
                            @if($table_mode == 0)
                                <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px"
                                        type="button" wire:click="sort">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor"
                                         class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            @elseif($table_mode == 1)
                                <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px"
                                        type="button" wire:click="default">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor"
                                         class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                    </svg>
                                </button>
                            @endif

                        </div>
                    </div>
                    <!-- Search and select END -->

                    <!-- Post list table START -->
                    <div class="table-responsive border-0">
                        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                            <!-- Table head -->
                            <thead class="table-dark">
                            <tr>
                                <th scope="col" class="border-0 rounded-start">نام کامل</th>
                                <th scope="col" class="border-0">شماره تماس</th>
                                <th scope="col" class="border-0">عکس</th>
                                <th scope="col" class="border-0">هیات مدیره/کمیسیون</th>
                                <th scope="col" class="border-0">تاریخ ثبت</th>
                                <th scope="col" class="border-0 rounded-end">عملیات</th>
                            </tr>
                            </thead>
                            @if($table_mode == 0)
                                @foreach($users as $user)
                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $user->full_name }}</a></h6>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $user->phone_number }}</a></h6>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <img src="{{ asset('storage/'.$user->image_url) }}" class="w-60 h-60 rounded">
                                        </td>
                                        @if($user->koms == 1)
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">کمیسیون</a></h6>
                                            </td>
                                        @elseif($user->koms == 2)
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">هیات مدیره</a></h6>
                                            </td>
                                        @endif
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="mb-0"><a href="#">{{ $user->submit_date_post  }}</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button wire:click="delete_id({{ $user->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                    <!-- Table body END -->
                                @endforeach
                            @elseif($table_mode == 1)
                                @foreach($sort_users as $sort_user)
                                    <!-- Table body START -->
                                    <tbody class="border-top-0">
                                    <!-- Table item -->
                                    <tr>
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $sort_user->full_name }}</a></h6>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $sort_user->phone_number }}</a></h6>
                                        </td>

                                        <!-- Table data -->
                                        <td>
                                            <img src="{{ asset('storage/'.$sort_user->image_url) }}" class="w-60 h-60 rounded">
                                        </td>
                                        @if($sort_user->koms == 1)
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">کمیسیون</a></h6>
                                            </td>
                                        @elseif($sort_user->koms == 2)
                                            <!-- Table data -->
                                            <td>
                                                <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">هیات مدیره</a></h6>
                                            </td>
                                        @endif
                                        <!-- Table data -->
                                        <td>
                                            <h6 class="mb-0"><a href="#">{{ $sort_user->submit_date_post  }}</a></h6>
                                        </td>
                                        <!-- Table data -->
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button wire:click="delete_id({{ $sort_user->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            @endif



                        </table>
                    </div>

                    <hr>
                    <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard')}}"
                       class="link-underline-primary text-decoration-underline">
                        برگشت
                    </a>

                </div>
            </div>
        </div>
    </section>
</div>
