<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Volt\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

new
#[Layout('layouts.app')]
class extends Component {

    use WithPagination, WithoutUrlPagination;

    public string $filter = '';
    public ?string $search = '';
    public string $edit_user_id = '';


    #[Computed]
    public function users()
    {
        if ($this->filter === 'admin') {
            return User::where('role', 'admin')->where('username', 'like', '%' . $this->search . '%')->paginate(4);
        } elseif ($this->filter === 'lawyer') {
            return User::where('role', 'lawyer')->where('username', 'like', '%' . $this->search . '%')->paginate(4);
        } elseif ($this->filter === 'trainee') {
            return User::where('role', 'trainee')->where('username', 'like', '%' . $this->search . '%')->paginate(4);
        } elseif ($this->filter === 'all') {
            return User::where('username', 'like', '%' . $this->search . '%')->paginate(4);
        } else {
            return User::where('username', 'like', '%' . $this->search . '%')->paginate(4);
        }
    }

    #[On('user-created')]
    public function updateUsers()
    {
        return $this->users();
    }

    public function setUserId($id)
    {
        $this->edit_user_id = '';
        $this->edit_user_id = $id;
        $this->dispatch('setUserId', edit_user_id: $this->edit_user_id);
    }

    public function removeUserId()
    {
        $this->edit_user_id = '';
        $this->dispatch('removeUserId');
    }

}; ?>

<div class="space-y-8 flex justify-center items-center flex-col text-center">

    <div class="relative w-96 text-center font-semibold text-2xl">
        لیست کاربران
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-3">

        <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between items-center">

            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input
                    type="text"
                    id="table-search"
                    placeholder="جست و جوی کاربران"
                    autocomplete="off"
                    wire:model.live="search"
                    class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                >
            </div>

            <div class="flex justify-center items-center gap-x-2">
                <div>
                    <flux:button
                        x-data
                        x-on:click="$dispatch('open-modal-create-user')"
                    >
                        {{ __('ساخت کاربر جدید') }}
                    </flux:button>
                </div>
                <div dir="ltr">
                    <flux:button.group>

                        <flux:button
                            x-on:click="$wire.filter = 'all'; $wire.removeUserId"
                            @click="$wire.updateUsers()"
                        >
                            همه
                        </flux:button>

                        <flux:button
                            x-on:click="$wire.filter = 'admin'; $wire.removeUserId"
                            @click="$wire.updateUsers()"
                        >
                            ادمین ها
                        </flux:button>

                        <flux:button
                            x-on:click="$wire.filter = 'lawyer'; $wire.removeUserId"
                            @click="$wire.updateUsers()"
                        >
                            وکلا
                        </flux:button>

                        <flux:button
                            x-on:click="$wire.filter = 'trainee'; $wire.removeUserId"
                            @click="$wire.updateUsers()"
                        >
                            کارآموزان
                        </flux:button>

                    </flux:button.group>
                </div>
            </div>

        </div>

        <table class="bg-red-500 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 w-full">
            <thead class="text-s text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 w-36">
                    کاربران
                </th>
                <th scope="col" class="px-6 py-3 w-10">
                    نقش
                </th>
                <th scope="col" class="px-6 py-3 w-24">
                    کد ملی
                </th>
                <th scope="col" class="px-6 py-3 w-36">
                    نام
                </th>
                <th scope="col" class="px-6 py-3 w-36">
                    موبایل
                </th>
                <th scope="col" class="px-6 py-3 w-56">
                    ایمیل
                </th>
                <th scope="col" class="px-6 py-3 w-36">
                    Actions
                </th>
            </tr>
            </thead>

            <tbody>

            @foreach($this->users as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 transition-all">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->username }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $user->role }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->n_code }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->mobile }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->email }}
                    </td>
                    <td class="px-6 py-4">
                        <a
                            href="{{ URL::signedRoute('edit-user-info', ['user_id' => $user->id]) }}"
                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline cursor-pointer"
                        >
                            ویرایش
                        </a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>

    <div>
        {{ $this->users->links(data: ['scrollTo' => false]) }}
    </div>

    <x-pre-built.create-user-modal>
        <livewire:actions.create-user/>
    </x-pre-built.create-user-modal>

</div>
