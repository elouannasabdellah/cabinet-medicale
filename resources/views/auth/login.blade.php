
<style>
    <style>
    body {
        background: linear-gradient(135deg, #f8f9fa 0%, #e7f1ff 100%) !important;
        font-family: 'Poppins', sans-serif;
    }
    .min-h-screen {
        background: none !important; /* Enlever le gris de Breeze */
    }
    /* Style de la carte de connexion */
    .w-full.sm\:max-w-md {
        border-top: 5px solid #0d6efd;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    /* Style du bouton Login */
    .inline-flex.items-center.bg-gray-800 {
        background-color: #0d6efd !important;
        border-radius: 50px !important;
        transition: 0.3s;
    }
    .inline-flex.items-center.bg-gray-800:hover {
        background-color: #0b5ed7 !important;
        transform: translateY(-2px);
    }
    /* Style des inputs focus */
    input:focus {
        border-color: #0d6efd !important;
        ring-color: #0d6efd !important;
    }
</style>
</style>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
