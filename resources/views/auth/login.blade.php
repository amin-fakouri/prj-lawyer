<x-guest-layouts>

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">

        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">ورود به حساب کاربری</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <div class="w-96">
                    <label for="username" class="block text-sm font-medium leading-6 text-gray-900">نام کاربری:</label>
                    <div class="mt-2">
                        <input
                            id="username"
                            name="username"
                            type="text"
                            placeholder="ali465alavi"
                            autocomplete="off"
                            value="{{ old('username') }}"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('username')
                        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="w-96">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">گذرواژه:</label>
                    <div class="mt-2">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            placeholder="......"
                            autocomplete="off"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                        <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                            {{$message}}
                        </span>
                    @enderror
                    @error('incorrectness')
                    <span class='mt-2 text-sm text-red-600 dark:text-red-500'>
                            {{$message}}
                        </span>
                    @enderror
                </div>

                <div class="w-48 mx-auto">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                </div>
            </form>
        </div>

    </div>

</x-guest-layouts>
