<div>








    @php $counter_post=0; @endphp

    @foreach($complaints as $complaint)
        @php $counter_post++; @endphp
    @endforeach


    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <div class="d-sm-flex justify-content-sm-between align-items-center">
                        <h1 class="mb-2 mb-sm-0 h3">لیست شکایات <span class="badge bg-primary bg-opacity-10 text-primary">{{ $counter_post    }}</span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row g-4 mb-4">

                    </div>
                </div>
            </div>




















            <div class="col-12">
                <!-- Blog list table START -->
                <div class="card border bg-transparent rounded-3">

                    <!-- Card header END -->

                    <!-- Card body START -->
                    <div class="card-body">

                        <!-- Search and select START -->
                        <div class="row g-3 align-items-center justify-content-between mb-3">
                            <!-- Search -->
                            <div class="col-md-8">
                                <div class="rounded position-relative">
                                    <input class="form-control pe-5 bg-transparent" type="text" wire:model.live="search" placeholder="جستجو شاکی" aria-label="Search">
                                    <button class="btn bg-transparent border-0 px-2 py-0 position-absolute top-50 end-0 translate-middle-y" type="submit"><i class="fas fa-search fs-6 "></i></button>
                                </div>
                            </div>

                            <!-- Select option -->
                            <div class="col-md-1">
                                <!-- Short by filter -->
                                @if($sort_table == 0)
                                    <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px" type="button" wire:click="sort">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                             class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
                                @elseif($sort_table == 1)
                                    <button class="btn btn-primary" style="border-radius: 100px; padding: 12px 15px" type="button" wire:click="default">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                             class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5m-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5"/>
                                        </svg>
                                    </button>
                                @endif

                            </div>
                        </div>
                        <!-- Search and select END -->

                        <!-- Blog list table START -->
                        <div style="height: 300px; overflow-y: scroll" class="table-responsive border-0">
                            <table class="table align-middle p-4 mb-0 table-hover table-shrink">
                                <!-- Table head -->
                                <thead class="table-dark">
                                <tr>
                                    <th scope="col" class="border-0 rounded-start">نام وکیل/کارآموز</th>
                                    <th scope="col" class="border-0">شاکی</th>
                                    <th scope="col" class="border-0">متشکی</th>
                                    <th scope="col" class="border-0">توضیحات</th>
                                    <th scope="col" class="border-0">تاریخ</th>
                                    <th scope="col" class="border-0">ساعت</th>
                                    <th scope="col" class="border-0 rounded-end">عملیات</th>
                                </tr>
                                </thead>



                                @if($sort_table == 0)

                                    @php $counter_row_post=0; @endphp

                                    @foreach($complaints as $complaint)
                                        @php $counter_row_post++; @endphp

                                            <!-- Table body START -->
                                        <tbody class="border-top-0">
                                        <!-- Table item -->
                                        <tr>
                                            <!-- Table data -->

                                            @foreach($users as $user)
                                                @if($complaint->user_id == $user->id)
                                                    <td>
                                                        <h6 class="course-title mt-2 mt-md-0 mb-0"><a
                                                                href="#">{{ $user->f_name.' '.$user->l_name }}</a></h6>
                                                    </td>
                                                @endif
                                            @endforeach



                                            <td>{{ $complaint->complainant }}</td>

                                            <td>{{ $complaint->complainee }}</td>
                                            <!-- Table data -->
                                            <td>
                                                <a href="#" class="badge text-black mb-2 w-80"
                                                   style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $complaint->description }}</a>

                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                {{ $complaint->submit_date_com }}
                                            </td>

                                            <td>{{ $complaint->submit_clock_com }}</td>
                                            <!-- Table data -->
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <button wire:click="delete_post({{ $complaint->id }})"
                                                       class="btn btn-light text-dark btn-round mb-0" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="حذف"><i
                                                            class="bi bi-trash"></i></button>
                                                    <a class="btn btn-light text-dark btn-round mb-0" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="دیدن"
                                                        href="{{ \Illuminate\Support\Facades\URL::signedRoute('see_complaint', ['com_id' => $complaint->id]) }}">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                        <!-- Table body END -->

                                    @endforeach

                                @elseif($sort_table == 1)


                                    @php $counter_row_post=0; @endphp

                                    @foreach($sort_complaints as $sort_complaint)
                                        @php $counter_row_post++; @endphp

                                            <!-- Table body START -->
                                        <tbody class="border-top-0">
                                        <!-- Table item -->
                                        <tr>
                                            <!-- Table data -->

                                            @foreach($users as $user)
                                                @if($sort_complaint->user_id == $user->id)
                                                    <td>
                                                        <h6 class="course-title mt-2 mt-md-0 mb-0"><a
                                                                href="#">{{ $user->f_name.' '.$user->l_name }}</a></h6>
                                                    </td>
                                                @endif
                                            @endforeach


                                            <!-- Table data -->
                                            <td>{{ $sort_complaint->complainant }}</td>

                                            <td>{{ $sort_complaint->complainee }}</td>
                                            <!-- Table data -->
                                            <td>
                                                <a href="#" class="badge text-black mb-2 w-80"
                                                   style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis">{{ $sort_complaint->description }}</a>

                                            </td>
                                            <!-- Table data -->
                                            <td>
                                                {{ $sort_complaint->submit_date_com }}
                                            </td>

                                            <td>{{ $sort_complaint->submit_clock_com }}</td>
                                            <!-- Table data -->
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a wire:click="delete_post({{ $sort_complaint->id }})"
                                                       class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip"
                                                       data-bs-placement="top" title="حذف"><i
                                                            class="bi bi-trash"></i></a>
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
                        @if(auth()->user()->role == 'admin')
                            <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard')}}"
                               class="link-underline-primary text-decoration-underline">
                                برگشت
                            </a>

                        @elseif(auth()->user()->role == 'lawyer')
                            <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard')}}"
                               class="link-underline-primary text-decoration-underline">
                                برگشت
                            </a>

                        @elseif(auth()->user()->role == 'trainee')
                            <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard')}}"
                               class="link-underline-primary text-decoration-underline">
                                برگشت
                            </a>
                        @endif
                    </div>

                    <!-- Blog list table END -->
                </div>


            </div>
            <!-- Counter END -->

        </div>
    </section>




</div>
