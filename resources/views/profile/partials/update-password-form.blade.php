<section>
    <header>
        <h2 class="text-slate-700 font-semibold text-sm mb-3">
            {{ __('Ganti Password') }}
        </h2>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        @method('put')

        <div>
            <x-input-label for="update_password_current_password" class="block text-xs font-medium text-slate-600 mb-1" :value="__('Kata Sandi Saat Ini')" />
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password" class="block text-xs font-medium text-slate-600 mb-1" :value="__('Kata Sandi Baru')" />
            <x-text-input id="update_password_password" name="password" type="password" class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" class="block text-xs font-medium text-slate-600 mb-1" :value="__('Konfirmasi Kata Sandi')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="col-span-2 text-right mt-2">
            <x-primary-button class="bg-blue-500 text-white text-xs px-4 py-2.5 rounded shadow hover:shadow-md transition">{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
