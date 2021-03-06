<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
{{--            <x-jet-authentication-card-logo />--}}
            <img src="{{ asset('images/img-removebg-preview.png') }}" alt="" size="30"style="height: 200px">

        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Nama') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-jet-label value="{{ __('Umur') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="age" :value="old('age')" required autofocus autocomplete="age" />
            </div>

            <div>
                <x-jet-label value="{{ __('Hobi') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="hobby" :value="old('hobby')" required autofocus autocomplete="hobby" />
            </div>

            <div>
                <x-jet-label value="{{ __('Feature') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="feature" :value="old('feature')" required autofocus autocomplete="feature" />
            </div>

            {{--            <div class="mt-4">--}}
{{--                <x-jet-label value="{{ __('Email') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label value="{{ __('Password') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />--}}
{{--            </div>--}}

{{--            <div class="mt-4">--}}
{{--                <x-jet-label value="{{ __('Confirm Password') }}" />--}}
{{--                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />--}}
{{--            </div>--}}

            <div class="flex items-center justify-end mt-4">
{{--                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">--}}
{{--                    {{ __('Already registered?') }}--}}
{{--                </a>--}}

                <x-jet-button class="ml-4">
                    {{ __('Daftar') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
