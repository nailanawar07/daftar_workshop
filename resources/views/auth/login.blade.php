<x-guest-layout>
    <h3 class="pt-4 pb-4 font-bold text-3xl dark:text-gray-400 text-center cursor-default">Masuk</h3>
  
    <!-- Session Status -->
    @if (session('status'))
  <div 
      x-data="{ show: true }" 
      x-init="setTimeout(() => show = false, 3000)" 
      x-show="show"
      x-transition
      class="mb-4 text-sm text-green-700 bg-green-100 border border-green-300 px-4 py-2 rounded-lg text-center"
  >
      {{ session('status') }}
  </div>
@endif

  
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf
  
      <div>
        <label for="email" class="mb-2 dark:text-gray-400" style="text-align: left">Email</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>
  
      <div>
        <label for="password" class="mb-2 dark:text-gray-400">Kata Sandi</label>
        <input id="password" name="password" type="password" required
          class="border dark:bg-indigo-700 dark:text-gray-300 dark:border-gray-700 p-3 shadow-md placeholder:text-base border-gray-300 rounded-lg w-full focus:scale-105 ease-in-out duration-300" style="height: 40px"
          placeholder="Kata Sandi" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="flex justify-end mt-2">
        <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:underline">
          Lupa kata sandi?
        </a>
      </div>
  
      <button type="submit"
        class="bg-gradient-to-r from-blue-500 to-purple-500 shadow-lg mt-6 p-2 text-white rounded-lg w-full hover:scale-105 hover:from-purple-500 hover:to-blue-500 transition duration-300 ease-in-out">
        MASUK
      </button>
    </form>

    
  
    <div class="flex flex-col mt-4 items-center justify-center text-sm">
      
      <h3>
        <span class="cursor-default dark:text-gray-300">Tidak punya akun?</span>
        <a class="group text-blue-400 ml-1" href="{{ route('register') }}">
          <span
            class="bg-left-bottom bg-gradient-to-r from-blue-400 to-blue-400 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">
            Daftar
          </span>
        </a>
      </h3>
    </div>
  </x-guest-layout>
  