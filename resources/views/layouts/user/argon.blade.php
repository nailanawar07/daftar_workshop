<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Dashboard User')</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/argon/img/logo_uas.png') }}">

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

  <style>
    .fixed-bg-top {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 325px;
      background: linear-gradient(135deg, #3674B5, #578FCA);
      z-index: 0;
    }
    .jarak{
      margin-top: 70px;
    }
  </style>
</head>
<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default text-slate-500 bg-white">

  <!-- Background Biru di Atas -->
  <div class="fixed-bg-top"></div>

  <!-- Navbar -->
  @include('components.navbar_user')

  <!-- Sidebar -->
  @include('components.sidebar_user')

  <!-- Main Content -->
  <main class="relative z-10 ml-64 pt-[320px] px-4 md:px-10 transition-all duration-200 ease-in-out jarak">
    @yield('content')
  </main>

  <!-- Popper.js -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

  <!-- Plugin for charts -->
  <script src="{{ asset('assets/argon/js/plugins/chartjs.min.js') }}" async></script>

  <!-- Plugin for scrollbar -->
  <script src="{{ asset('assets/argon/js/plugins/perfect-scrollbar.min.js') }}" async></script>

  <!-- Main script -->
  <script src="{{ asset('assets/argon/js/argon-dashboard-tailwind.js') }}?v=1.0.1" async></script>
</body>
</html>
