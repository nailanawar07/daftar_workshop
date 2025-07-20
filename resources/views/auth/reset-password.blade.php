<x-guest-layout>
  <h3 class="pt-6 pb-4 font-bold text-3xl dark:text-gray-400 text-center cursor-default">
    Atur Ulang Kata Sandi
  </h3>

  <p class="mb-4 text-sm text-gray-600 dark:text-gray-300 text-center leading-relaxed">
    Masukkan email dan kata sandi barumu ya. Kami bantu kamu buat mulai ulang dengan aman dan nyaman 🌷
  </p>

  <form method="POST" action="{{ route('password.store') }}" class="space-y-4">
    @csrf

    <!-- Token Reset -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email -->
    <div>
      <label for="email" class="text-gray-700 dark:text-gray-300 text-sm">Email</label>
      <input id="email" name="email" type="email" required autofocus
        value="{{ old('email', $request->email) }}"
        class="border border-gray-300 dark:border-gray-600 rounded-lg w-full p-3 mt-1 text-sm dark:bg-indigo-700 dark:text-gray-200 shadow-md focus:ring-2 focus:ring-pink-300 transition"
        placeholder="Alamat Email" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="text-gray-700 dark:text-gray-300 text-sm">Kata Sandi Baru</label>
      <input id="password" name="password" type="password" required
        class="border border-gray-300 dark:border-gray-600 rounded-lg w-full p-3 mt-1 text-sm dark:bg-indigo-700 dark:text-gray-200 shadow-md focus:ring-2 focus:ring-pink-300 transition"
        placeholder="Kata Sandi Baru" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div>
      <label for="password_confirmation" class="text-gray-700 dark:text-gray-300 text-sm">Ulangi Kata Sandi</label>
      <input id="password_confirmation" name="password_confirmation" type="password" required
        class="border border-gray-300 dark:border-gray-600 rounded-lg w-full p-3 mt-1 text-sm dark:bg-indigo-700 dark:text-gray-200 shadow-md focus:ring-2 focus:ring-pink-300 transition"
        placeholder="Konfirmasi Kata Sandi" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <!-- Submit Button -->
    <div class="flex justify-end">
      <button type="submit"
        class="bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:from-purple-300 hover:to-pink-300 transition-all duration-300 ease-in-out">
        Simpan Kata Sandi
      </button>
    </div>
  </form>
</x-guest-layout>
