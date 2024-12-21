<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ثبت لینک</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="create">


                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">لینک را وارد کنید</label>
                                            <input class="form-control" wire:model="link" placeholder="..">
                                            @error('title')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">درج پست</button>
                                    <hr>
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ route('admin-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'lawyer')
                                        <a href="{{ route('lawyer-dashboard-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'trainee')
                                        <a href="{{ route('trainee-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="table-responsive border-0">
        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
            <!-- Table head -->
            <thead class="table-dark">
            <tr>
                <th scope="col" class="border-0 rounded-start">عنوان خبر</th>
                <th scope="col" class="border-0 rounded-end">عملیات</th>
            </tr>
            </thead>




            @foreach($links as $link)
                <!-- Table body START -->
                <tbody class="border-top-0">
                <!-- Table item -->
                <tr>
                    <!-- Table data -->
                    <td>
                        <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $link->link }}</a></h6>
                    </td>



                    <td>
                        <div class="d-flex gap-2">
                            <a wire:click="delete_post({{ $link->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                        </div>
                    </td>
                </tr>

                </tbody>

            @endforeach






        </table>
    </div>

</div>
