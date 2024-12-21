<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">تغییر عکس</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="update({{ $find_user_id->id }})">
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عکس کنونی</label>
                                            <br>
                                            <img src="{{ asset('storage/'.$find_user_id['image_profile']) }}" class="w-80 h-50 rounded">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">نام کاربر</label>
                                            <input class="form-control" wire:model="image" type="file">
                                            @error('image')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                            @if ($this->image)
                                                <img src="{{ $this->image->temporaryUrl() }}" class="w-40 h-40" alt="{{ $this->image->getClientOriginalName() }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>




                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">ذخیره</button>
                                    <hr>
                                    @if(auth()->user()->role == 'admin')
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('admin-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'lawyer')
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('lawyer-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @elseif(auth()->user()->role == 'trainee')
                                        <a href="{{ \Illuminate\Support\Facades\URL::signedRoute('trainee-dashboard') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    @else

                                    @endif
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section></div>
