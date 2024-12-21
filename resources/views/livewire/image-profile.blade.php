<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">عکس پروفایل</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="update_image({{ auth()->user()->id }})">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->



                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">نام کاربر</label>
                                            <input wire:model="path" required
                                                   type="file" class="form-control">
                                            @error('path')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            @if ($this->image)
                                                <br>
                                                <img src="{{ $this->image->temporaryUrl() }}" class="w-40 h-40" alt="{{ $this->image->getClientOriginalName() }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">ایجاد کاربر</button>
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
</div>
