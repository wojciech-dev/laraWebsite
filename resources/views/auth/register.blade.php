<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo"></x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div class="bg-white p-5 m-10 max-w-md mx-auto rounded shadow-md">
            <h2 class="text-4xl px-4 ">Register</h2>
            <form method="POST" action="{{ route('register') }}" class="mt-10 space-y-8">
                @csrf

                <div>
                    <x-jet-input id="name" class="w-full border rounded h-12 px-4" type="text" name="name"
                        :value="old('name')" placeholder="name" required autofocus autocomplete="name" />
                </div>

                <div class="mt-4">
                    <x-jet-input id="email" class="w-full border rounded h-12 px-4" type="email" name="email"
                        placeholder="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-jet-input id="password" class="w-full border rounded h-12 px-4" type="password" name="password"
                        placeholder="password" required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-input id="password_confirmation" class="w-full border rounded h-12 px-4" type="password"
                        name="password_confirmation" placeholder="Confirm Password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-jet-input id="phone" class="w-full border rounded h-12 px-4" type="number" name="phone"
                        placeholder="phone" :value="old('phone')" required />
                </div>

                <div class="mt-4">
                    <select name="registeras" id="registeras" class="w-full border rounded h-12 px-4">
                        <option value="customer">Customer</option>
                        <option value="provider">Provider</option>
                    </select>
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of
                                    Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'"
                                    class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy
                                    Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
                @endif

                <div class="flex flex-col md:flex-row md:items-center justify-between ">

                    <x-jet-button
                        class="bg-teal-500 text-sm active:bg-gray-700 cursor-pointer font-regular text-white px-4 py-2 rounded uppercase hover:bg-sky-700">
                        {{ __('Register') }}
                    </x-jet-button>

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                </div>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>