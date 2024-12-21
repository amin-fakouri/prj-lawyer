<?php

use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new
#[Layout('layouts.app')]
class extends Component {

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';
    public string $find_user_id;

    /**
     * Update the password for the currently authenticated user.
     */

    public function mount($user_id)
    {
        $this->find_user_id = \App\Models\User::find($user_id);
    }

    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::min(6), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->current_password = '';
        $this->password = '';
        $this->password_confirmation = '';

        $this->dispatch('password-updated');
    }

}; ?>

<div>

    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">تغییر گذرواژه</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Chart START -->
                    <div class="card border">
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit="updatePassword">
                                <!-- Main form -->

                                <div class="row">
                                    <div class="col-12">
                                        <!-- Post name -->
                                        <div class="mb-3">
                                            <label class="form-label">گذرواژه کنونی</label>
                                            <input wire:model="current_password" required id="con-name" name="name"
                                                   type="text" class="form-control" placeholder="****">
                                            @error('current_password')
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
                                            <label class="form-label">گذرواژه جدید</label>
                                            <input wire:model="password" required id="con-name" name="name"
                                                   type="text" class="form-control" placeholder="****">
                                            @error('password')
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
                                            <label class="form-label">تایید گذرواژه جدید</label>
                                            <input wire:model="password_confirmation" required id="con-name" name="name"
                                                   type="password" class="form-control" placeholder="****">
                                            @error('password_confirmation')
                                            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                                                    {{$message}}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>



                                <!-- Create post button -->
                                <div class="col-md-12 text-start">
                                    <button class="btn btn-primary w-100" type="submit">تفییر گذرواژه</button>
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
    </section>

</div>
