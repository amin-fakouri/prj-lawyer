<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\{Layout, Title, Validate};
use Illuminate\Validation\Rules\Password;

new
#[Layout('layouts.app')]
class extends Component {

    public function rules()
    {
        return [
            'password' => [
                'required', 'string', 'unique:users,password',
                Password::min(6),
            ],
            'username' => [
                'required', 'string', 'min:3', 'max:30', 'unique:users,username'
            ],
            'role' => [
                'required'
            ],
        ];
    }

    #[Validate]
    public string $role;
    #[Validate]
    public string $username;
    #[Validate]
    public string $password;

    public function createUser()
    {
        $this->validate();

        User::create([
            'username' => substr($this->role, 0, 2) . '_' . $this->username,
            'role' => $this->role,
            'password' => Hash::make($this->password)
        ]);

        $this->reset();

        $this->dispatch('user-created');
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

}; ?>

<div>




    <section class="py-4">
        <div class="container">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- Title -->
                    <h1 class="mb-0 h3">ایجاد کاربر</h1>
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
                                            <label class="form-label">انتخاب نقش</label>
                                            <select wire:model="role" id="roles" name="roles" class="form-select">
                                                <option selected>یک نقش انتخاب کنید</option>
                                                <option value="manager">هیات مدیره</option>
                                                <option value="admin">ادمین</option>
                                                <option value="lawyer">وکیل</option>
                                                <option value="trainee">کارآموز</option>
                                            </select>
                                            @error('role')
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
                                                <label class="form-label">نام کاربر</label>
                                                <input wire:model="username" required id="con-name" name="name"
                                                       type="text" class="form-control" placeholder="امین امینی">
                                                @error('username')
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
                                            <label class="form-label">رمز عبور</label>
                                            <input wire:model="password" required id="con-name" name="name"
                                                   type="password" class="form-control" placeholder="*****">
                                            @error('password')
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


</div>
