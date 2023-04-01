<x-guest-layout>

    <x-slot name="logo"></x-slot>

    <x-jet-validation-errors class="m-5 text-center text-red-600" />

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <div class="bg-white p-5 m-10 max-w-md mx-auto rounded shadow-md">
        <h2 class="text-4xl px-4 ">Log In</h2>

        <form method="POST" action="{{ route('login') }}" class="mt-10 space-y-8">
            @csrf

            <div>
                <x-jet-input id="email" class="w-full border rounded h-12 px-4" type="email" name="email"
                    :value="old('email')" placeholder="email" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="w-full border rounded h-12 px-4 -mr-7" type="password" name="password"
                    placeholder="Password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col md:flex-row md:items-center justify-between ">
                <input
                    class="bg-teal-500 text-sm active:bg-gray-700 cursor-pointer font-regular text-white px-4 py-2 rounded uppercase hover:bg-sky-700"
                    type="submit" value="login now" />
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
                @endif

            </div>
        </form>
    </div>

</x-guest-layout>