<x-guest-layout>
    <x-auth-card>
        <div class="items-center text-center"><p>【講義者用】</p></div>
        <x-slot name="logo">
            <div class="w-32">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('owner.login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('owner.password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('owner.password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
        <div class="flex justify-center gap-6 mt-10">
            <a href="{{ route('admin.login') }}" class="underline decoration-2 flex flex-col justify-end"><img class="mx-auto " src="{{ asset('storage/admin.png') }}" alt="" width="60">管理者ログイン</a>
            <a href="{{ route('user.login') }}" class="underline decoration-2"><img class="mx-auto " src="{{ asset('storage/user.png') }}" alt="" width="60">受講者ログイン</a>
        </div>
    </x-auth-card>
</x-guest-layout>
