<style>
    .grid-container {
        display: grid;
        grid-template-columns: 420px 420px;
    }
    .grid-container > .logo {
        text-align: center;
    }
</style>
<x-guest-layout>
    <div class="grid-container">
        <div class="logo" style="background-color:#ee8355;padding-top:160px;font-size: 60px; font-family:Josefin Sans; color:white;">
            <b>Unspoken</b>
        </div>
        <div style="background-color:#2b2b2b; padding:50px;">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div style="color: #ee8355; padding-bottom: 10px">
            <h1 style="font-family:Josefin Sans; font-size:31px"><b>Bergabung bersama kami</b></h1>
            <p style="font-family:Josefin Sans; font-size:15px"><b>Masuk untuk membagikan cerita Anda</b></p>
        </div>

        <!-- Email Address -->
        <div style="color: #ee8355">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4" style="color: #ee8355">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4" style="color: #ee8355">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center" style="padding-top:7px">
            <p style="color:#ee8355; font-size:15px">Belum punya akun?</p>
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" style="padding-left: 5px"
                href="{{ route('register') }}">
                {{ __('Registrasi Disini') }}
            </a>
        </div>
        <div class="flex items-center">
            <p style="color:#ee8355; font-size:15px">Lupa Password?</p>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}" style="padding-left: 5px">
                    {{ __('Reset Password') }}
                </a>
            @endif
        </div>

        <div class="mt-4">
            <x-primary-button>
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
