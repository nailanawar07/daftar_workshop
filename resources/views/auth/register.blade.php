<x-guest-layout>
    <h3 class="pt-4 pb-4 font-bold text-3xl dark:text-gray-400 text-center cursor-default">Daftar</h3>
  
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf
  
      <!-- Name -->
      <div>
        <label for="name" class="mb-2 dark:text-gray-400">Nama</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required autofocus
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Nama Lengkap" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
  
      <!-- Email Address -->
      <div>
        <label for="email" class="mb-2 dark:text-gray-400">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Alamat Email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
  
      <!-- Password -->
      <div>
        <label for="password" class="mb-2 dark:text-gray-400">Kata Sandi</label>
        <input id="password" name="password" type="password" required
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Kata Sandi" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
  
      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="mb-2 dark:text-gray-400">Konfirmasi Kata Sandi</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Ulangi Kata Sandi" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>
  
      <button type="submit"
        class="bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out">
        DAFTAR
      </button>
    </form>

    <div class="flex flex-col mt-4 items-center justify-center text-sm">
      
        <h3>
          <span class="cursor-default dark:text-gray-300">Sudah punya akun?</span>
          <a class="group text-blue-400 ml-1" href="{{ route('login') }}">
            <span
              class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">
              Masuk
            </span>
          </a>
        </h3>
      </div>
  </x-guest-layout>
  