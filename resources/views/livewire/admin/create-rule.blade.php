<div>
    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">درج قوانین</h1>
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
                                            <label class="form-label">صفحه قرار گیرنده</label>
                                            <select wire:model="category" class="form-select">
                                                <option>صفحه قرار گیرنده</option>
                                                @foreach($name_pages as $name_page)
                                                    <option value="{{ $name_page->id }}">{{ $name_page->name_page }}</option>
                                                @endforeach

                                            </select>

                                        </div>

                                    </div>
                                </div>




                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">عنوان</label>
                                            <input class="form-control" wire:model="title" placeholder="عنوان">
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
                                            @if ($this->image)
                                                <img src="{{ $this->image->temporaryUrl() }}" class="w-40 h-40" alt="{{ $this->image->getClientOriginalName() }}">
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">محتوا</label>
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
        </div>
    </section></div>
