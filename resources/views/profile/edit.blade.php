{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}


@extends('layouts.admin.argon')

@section('content')
<main class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="w-full px-6 mx-auto mt-20">
    <div class="flex flex-wrap -mx-3">

      {{-- FORM PROFIL & PASSWORD --}}
      <div class="w-full max-w-full px-3 md:w-8/12 space-y-8">

        {{-- CARD: Edit Profil --}}
        <div class="bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                @include('profile.partials.update-profile-information-form')
            </div>
          </form>
        </div><br>

        {{-- CARD: Ganti Password --}}
        <div class="bg-white rounded-xl shadow-lg p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
          
            <div>
                @include('profile.partials.update-password-form')
            </div>
            
          
        </div>

      </div>

      {{-- SIDEBAR PROFIL --}}
      <div class="w-full max-w-full px-3 md:w-4/12">
        <div class="bg-white rounded-2xl shadow-lg h-full flex flex-col items-center text-center p-6">
      
          {{-- Cover --}}
          <img class=" rounded-xl mb-[-40px]" style="height: 400px;margin-top: 20px" src="{{ asset('assets/argon/img/kartini.jpg') }}" alt="cover">
      
         
          
      
          {{-- Info Tambahan --}}
          <div class="mt-6 text-left text-xs text-slate-600 w-full space-y-2">
            <center>
            <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role ?? 'admin') }}</p>
            <p><strong>Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
        </center>
          </div>
      
          
      
          
        </div>
      </div>
      

    </div>
  </div>
</main>
@endsection
