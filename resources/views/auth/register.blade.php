<style>
    .grid-container {
        display: grid;
        grid-template-columns: 420px 420px;
        height: 575px;
    }
    .grid-container > .logo {
        text-align: center;
    }
</style>
<x-guest-layout>
    <div class="grid-container">
        <div class="logo" style="background-color:#ee8355;padding-top:220px;font-size: 60px; font-family:Josefin Sans; color:white;">
            <b>Unspoken</b>
        </div>
        <div style="background-color:#2b2b2b;padding:50px;">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div style="color: #ee8355; padding-bottom: 10px">
                    <p style="font-size:40px; font-family:Josefin Sans"><b>Registrasi</b></p>
                </div>
                <!-- Name -->
                <div style="color: #ee8355">
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4" style="color: #ee8355">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4" style="color: #ee8355">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4" style="color: #ee8355">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-text-input style="background-color:#2b2b2b; border-color:#ee8355" id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center" style="padding-top:7px">
                    <p style="color:#ee8355; font-size:15px">Sudah punya akun?</p>
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" style="padding-left: 5px"
                        href="{{ route('login') }}">
                        {{ __('Login') }}
                    </a>
                </div>
                <div class="mt-4">
                    <x-primary-button>
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
</x-guest-layout>
