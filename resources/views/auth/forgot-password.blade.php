<x-guest-layout>
    <a href="{{ route('login') }}"
       class="text-sm text-pink-500 hover:underline hover:text-pink-600 transition duration-300 ease-in-out">
        ← Kembali
    </a>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-300 leading-relaxed"style="margin-top: 10px">
        {!! '<b>Ups, lupa kata sandi?</b><br>Nggak masalah kok! Tulis aja email kamu di bawah ini, nanti kami kirim tautan untuk reset sandi dengan mudah 🌸' !!}
    </div>
    

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 ">
            <x-primary-button class="bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:from-purple-300 hover:to-pink-300 transition-all duration-300 ease-in-out">
                {{ __('Reset Kata Sandi Sekarang') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
