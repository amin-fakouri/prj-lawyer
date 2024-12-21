<?php

use App\Models\User;
use App\Rules\NCode;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;
use Illuminate\Validation\Rules\Password;

new
#[Layout('layouts.app')]
class extends Component {

    #[Validate]
    public $username, $f_name, $l_name, $mobile, $n_code, $email, $find_user_id;

    public function mount($user_id)
    {
        $this->find_user_id = User::find($user_id);
    }

    public function boot()
    {
        $user = Auth::user();
        if ($user->name != null) {
            $f_name = explode(' ', $user->name)[0];
            $l_name = explode(' ', $user->name)[1];
            $this->f_name = $f_name;
            $this->l_name = $l_name;
        }
        if ($user->role !== 'admin') {
            $this->username = substr($user->username, 3);
        } else {
            $this->username = $user->username;
        }
        $this->name = $user->name;
        $this->mobile = $user->mobile;
        $this->n_code = $user->n_code;
        $this->email = $user->email;
    }

    public function rules()
    {
        return [
            'f_name' => [
                'nullable', 'string', 'min:3', 'max:25'
            ],
            'l_name' => [
                'nullable', 'string', 'min:3', 'max:25'
            ],
            'mobile' => [
                'nullable', 'numeric', 'regex:/^09[0-9]{9}$/'
            ],
            'n_code' => [
                'nullable', 'digits:10',
                new NCode(),
            ],
            'email' => [
                'nullable', 'email'
            ],
            'username' => [
                'nullable', 'string', 'min:3', 'max:30'
            ],
        ];
    }

    public function saveProfileInfo()
    {
        $this->validate();

        if (Auth::user()->role !== 'admin') {
            if (Auth::user()->role === 'trainee') {
                Auth::user()->update([
                    'username' => 'tr' . '_' . $this->username,
                    'name' => $this->f_name . ' ' . $this->l_name,
                    'mobile' => $this->mobile,
                    'n_code' => $this->n_code,
                    'email' => $this->email
                ]);
            } elseif (Auth::user()->role === 'lawyer') {
                Auth::user()->update([
                    'username' => 'la' . '_' . $this->username,
                    'name' => $this->f_name . ' ' . $this->l_name,
                    'mobile' => $this->mobile,
                    'n_code' => $this->n_code,
                    'email' => $this->email
                ]);
            }
        } else {
            Auth::user()->update([
                'username' => $this->username,
                'name' => $this->f_name . ' ' . $this->l_name,
                'mobile' => $this->mobile,
                'n_code' => $this->n_code,
                'email' => $this->email
            ]);
        }

        return $this->boot();

    }


}; ?>

<div class="space-y-8">

    <div class="w-96 text-center font-semibold text-2xl">

    </div>

    <div class="w-96">
        <label for="username" class="block text-sm font-medium leading-6 text-gray-900">نام کاربری:</label>
        <div class="mt-2">
            <div dir="ltr"
                 class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                @if((\auth()->user()->role === 'trainee') || (\auth()->user()->role === 'lawyer'))
                    <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">
                            {{ substr(\auth()->user()->username, 0, 2) }}_
                        </span>
                @endif
                <input
                    id="username"
                    wire:model="username"
                    type="text"
                    autocomplete="off"
                    placeholder="ali123alavie"
                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
            </div>
        </div>
        @error('username')
        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                    {{$message}}
                </span>
        @enderror
    </div>

    <div class="w-96 flex justify-evenly items-center gap-2">

        <div>
            <label for="f_name" class="block text-sm font-medium leading-6 text-gray-900">نام:</label>
            <div class="mt-2">
                <input
                    id="f_name"
                    wire:model="f_name"
                    type="text"
                    autocomplete="off"
                    placeholder="علی"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('f_name')
            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                        {{$message}}
                    </span>
            @enderror
        </div>

        <div>
            <label for="l_name" class="block text-sm font-medium leading-6 text-gray-900">نام خانوادگی:</label>
            <div class="mt-2">
                <input
                    id="l_name"
                    wire:model="l_name"
                    type="text"
                    autocomplete="off"
                    placeholder="علوی"
                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('l_name')
            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                        {{$message}}
                    </span>
            @enderror
        </div>

    </div>

    <div class="w-96">
        <label for="mobile" class="block text-sm font-medium leading-6 text-gray-900">شماره موبایل:</label>
        <div class="mt-2">
            <input
                id="mobile"
                wire:model="mobile"
                type="text"
                autocomplete="off"
                placeholder="09021209645"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        @error('mobile')
            <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                {{$message}}
            </span>
        @enderror
    </div>

    <div class="w-96">
        <label for="n_code" class="block text-sm font-medium leading-6 text-gray-900">کد ملی:</label>
        <div class="mt-2">
            <input
                id="n_code"
                wire:model="n_code"
                type="text"
                autocomplete="off"
                placeholder="6090117853"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        @error('n_code')
        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                    {{$message}}
                </span>
        @enderror
    </div>

    <div class="w-96">
        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">ایمیل:</label>
        <div class="mt-2">
            <input
                id="email"
                wire:model="email"
                type="text"
                autocomplete="off"
                placeholder="arya.jamali.2007@gmail.com"
                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
        @error('email')
        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                    {{$message}}
                </span>
        @enderror
    </div>

    <div class="w-48 mx-auto">
        <button
            wire:click="saveProfileInfo"
            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
            ذخیره اطلاعات
        </button>
    </div>

</div>
