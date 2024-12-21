<div>
    <section class="py-4">
        <div class="container">
        <div class="row pb-4">
            <div class="col-12">
                <!-- Title -->
                <h1 class="mb-0 h3">ایجاد درباره ما</h1>
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
                            <!-- Main form -->




                            <div class="row">
                                <div class="col-12">
                                    <!-- Post name -->
                                    <div class="mb-3">
                                        <label class="form-label">درباره ما</label>
                                        <textarea class="form-control" wire:model="about"></textarea>
                                        @error('about')
                                        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            <!-- Create post button -->
                            <div class="col-md-12 text-start">
                                <button class="btn btn-primary w-100" type="submit">ایجاد کاربر</button>
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
    </div>
    </section>


    <div class="table-responsive border-0">
        <table class="table align-middle p-4 mb-0 table-hover table-shrink">
            <!-- Table head -->
            <thead class="table-dark">
            <tr>
                <th scope="col" class="border-0 rounded-start">محتوا</th>
                <th scope="col" class="border-0 rounded-end">عملیات</th>
            </tr>
            </thead>




            @foreach($abouts as $about)
                    <!-- Table body START -->
                    <tbody class="border-top-0">
                    <!-- Table item -->
                    <tr>
                        <!-- Table data -->
                        <td>
                            <h6 class="course-title mt-2 mt-md-0 mb-0"><a href="#">{{ $about->about }}</a></h6>
                        </td>



                        <td>
                            <div class="d-flex gap-2">
                                <a wire:click="delete_post({{ $about->id }})" class="btn btn-light btn-round mb-0" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف"><i class="bi bi-trash"></i></a>
                            </div>
                        </td>
                    </tr>

                    </tbody>

            @endforeach






        </table>
    </div>


</div>
