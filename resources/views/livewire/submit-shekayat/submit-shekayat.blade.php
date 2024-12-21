<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ثبت شکایت</h1>
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

                                <input wire:model.fill="date" value="{{ jdate('Y/m/d') }}" disabled hidden>
                                <input wire:model.fill="clock" value="{{ jdate('H:i:s') }}" disabled hidden>
                                <input wire:model.fill="aaaa" value="aa" disabled hidden>
                                <!-- Main form -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">شاکی</label>
                                            <input wire:model="complainant" required id="con-name" name="name" type="text" class="form-control" placeholder="علی علوی">
                                            @error('complainant')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Post name -->
                                            <div class="mb-3">
                                                <label class="form-label">متشکی</label>
                                                <input wire:model="complainee" required id="con-name" name="name"
                                                       type="text" class="form-control" placeholder="امین امینی">
                                                @error('complainee')
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

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">توضیحات</label>
                                            <textarea wire:model="description" class="form-control" rows="3" placeholder="توضیح مختصری را درباره شکایت بنویسید..."></textarea>
                                            @error('description')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                {{$message}}
                                            </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <!-- Create post button -->
                                    <div class="col-md-12 text-start">
                                        <button class="btn btn-primary w-100" type="submit">ثبت شکایت</button>
                                        <hr>
                                        <a href="{{ route('welcome') }}"
                                           class="link-underline-primary text-decoration-underline">
                                            برگشت
                                        </a>
                                    </div>
                                </div>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                    <!-- Chart END -->
                </div>
            </div>
        </div>
    </section>

</div>
