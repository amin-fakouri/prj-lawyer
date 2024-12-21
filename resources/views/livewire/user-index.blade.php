<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    @php $counter_users=0; @endphp
                    @foreach($users as $user)
                        @php $counter_users++; @endphp
                    @endforeach
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3">لیست کاربران <span class="badge bg-primary bg-opacity-10 text-primary">{{ $counter_users }}</span></h1>
                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('create-user') }}"
                           class="btn btn-sm btn-primary mb-0 rounded-3"><i style="font-size: 20px"
                                                                            class="bi bi-person-add me-2"></i>ایجاد کابر</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row g-4 mb-4">
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                @php $counter_admins=0; @endphp
                                @foreach($users as $user)
                                    @if($user->role == "admin")
                                        @php $counter_admins+=1; @endphp
                                    @else
                                        @php $counter_admins+=0; @endphp
                                    @endif
                                @endforeach
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0">{{ $counter_admins }}</h3>
                                    <h6 class="mb-0">ادمین</h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                @php $counter_lawyer=0; @endphp
                                @foreach($users as $user)
                                    @if($user->role == "lawyer")
                                        @php $counter_lawyer+=1; @endphp
                                    @else
                                        @php $counter_lawyer+=0; @endphp
                                    @endif
                                @endforeach
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0">{{ $counter_lawyer }}</h3>
                                    <h6 class="mb-0">وکلا</h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                        <div class="col-sm-4 col-lg-2">
                            <!-- Card START -->
                            <div class="card card-body border h-100">
                                @php $counter_trainee=0; @endphp
                                @foreach($users as $user)
                                    @if($user->role == "trainee")
                                        @php $counter_trainee+=1; @endphp
                                    @else
                                        @php $counter_trainee+=0; @endphp
                                    @endif
                                @endforeach
                                <!-- Icon -->
                                <div class="fs-3 text-start text-success">
                                    <i class="bi bi-person-fill"></i>
                                </div>
                                <!-- Content -->
                                <div class="ms-0">
                                    <h3 class="mb-0">{{ $counter_trainee }}</h3>
                                    <h6 class="mb-0">کارآموز</h6>
                                </div>
                            </div>
                            <!-- Card END -->
                        </div>
                    </div>
                    <!-- Post list table START -->
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
                                        <th scope="col" class="border-0 rounded-start">عنوان</th>
                                        <th scope="col" class="border-0">نام کاربری</th>
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
                                                    <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $user->role }}</a></h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <h6 class="mb-0"><a href="#">{{ $user->username  }}</a></h6>
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
                                                    <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $sort_user->role }}</a></h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <h6 class="mb-0"><a href="#">{{ $sort_user->username  }}</a></h6>
                                                </td>
                                                <!-- Table data -->
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <button wire:click="delete_id({{ $sort_user->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                            <!-- Table body END -->
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
                    <!-- Post list table END -->
                </div>
            </div>
        </div>
    </section>

</div>
