<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
      body {
        font-family: 'Poppins', sans-serif;
      }
    </style>
  </head>
  <body class="flex font-poppins items-center justify-center dark:bg-gray-900 min-w-screen min-h-screen bg-gray-100">
    <div class="grid gap-8 w-full flex justify-center">
        <div class="bg-gradient-to-r from-blue-500 to-purple-500 rounded-[26px] m-4" class="min-h-[550px] w-[400px]"
        >
          <div class="border-[20px] border-transparent rounded-[20px] dark:bg-gray-900 bg-white shadow-lg p-6 sm:p-10 m-2">
            {{ $slot }}
          </div>
        </div>
      </div>      
  </body>
</html>
