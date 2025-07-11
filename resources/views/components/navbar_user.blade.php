<nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
    <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
      <nav>
        <!-- breadcrumb -->
        @php
    $routeName = Route::currentRouteName();
  
    $pageTitle = match($routeName) {
        'user.home' => 'Beranda',
        'user.daftar' => 'Daftar Workshop',
        'user.myworkshop' => 'My Workshop',
        'user.profil' => 'Profil',
        default => 'Halaman',
    };
  @endphp
  
  <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16" style="margin-left: 18rem;">
  <li class="text-sm leading-normal">
    <a class="text-white opacity-50" href="javascript:;">Halaman</a>
  </li>
  <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">{{ $pageTitle }}</li>
  </ol>
  
      </nav>
  
      <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
          <div class="relative flex flex-wrap items-stretch w-full transition-all rounded-lg ease">
            <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
              <i class="fas fa-search"></i>
            </span>
            <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850 dark:text-white bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Cari disini..." />
          </div>
        </div>
        <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <li class="flex items-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center px-4 py-2 text-sm font-semibold text-white hover:text-red-500 transition">
                    <i class="fa fa-sign-out-alt mr-2"></i> Keluar
                </button>
            </form>
            
          </li>
        </ul>
      </div>
    </div>
  </nav>