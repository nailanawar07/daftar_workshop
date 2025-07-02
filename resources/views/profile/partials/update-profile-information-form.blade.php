<section>
    <header>
        <h2 class="text-slate-700 font-semibold text-sm mb-3">
            {{ __('Edit Profil') }}
        </h2>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" class="block text-xs font-medium text-slate-600 mb-1" :value="__('Nama')" />
            <x-text-input id="name" name="name" type="text" class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" class="block text-xs font-medium text-slate-600 mb-1" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-span-2 text-right mt-2">
            <x-primary-button class="bg-blue-500 text-white text-xs px-4 py-2.5 rounded shadow hover:shadow-md transition">{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
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
