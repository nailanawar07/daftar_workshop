<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Argon</title>
  
    <!-- Popper -->
    

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/argon/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/argon/css/nucleo-svg.css') }}" rel="stylesheet" />

  <!-- Argon Tailwind CSS -->
  <link href="{{ asset('assets/argon/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />

  
    <!-- Main Styling -->
    <link href="{{ asset('assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
</head>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
      
        {{-- Sidebar tetap di luar main --}}
        @include('components.sidebar_admin')
      
        {{-- Satu main saja untuk konten dan navbar --}}
        <main class="relative ml-64 bg-blueGray-50 min-h-screen">
          @include('components.navbar_admin')
      
          <div class="px-4 md:px-10 mx-auto w-full py-10">
            @yield('content')
          </div>
        
          {{-- Tambahkan ini --}}
          @yield('modals')
        </main>
     
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>


<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        


  <!-- Popper.js -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>

  <!-- Plugin for charts -->
  <script src="{{ asset('assets/argon/js/plugins/chartjs.min.js') }}" async></script>

  <!-- Plugin for scrollbar -->
  <script src="{{ asset('assets/argon/js/plugins/perfect-scrollbar.min.js') }}" async></script>

  <!-- Main script -->
  <script src="{{ asset('assets/argon/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>

  

</body>
</html>
