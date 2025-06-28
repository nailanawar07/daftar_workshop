@extends('layouts.user.argon')

@section('content')
<div class="w-full px-6 py-6 mx-auto">
  <h2 class="text-xl font-bold text-slate-800 dark:text-white mb-4">Workshop Tersedia</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @forelse ($workshops as $workshop)
      <div class="bg-white dark:bg-slate-800 rounded-xl shadow-md hover:shadow-lg transition p-5 flex flex-col justify-between">
        <div>
          <h3 class="text-lg font-semibold text-slate-800 dark:text-white mb-1">{{ $workshop->judul }}</h3>
          <p class="text-sm text-gray-600 dark:text-gray-300">{{ $workshop->pemateri }}</p>
          <p class="text-xs text-gray-400 dark:text-gray-400 mt-1">{{ $workshop->waktu }}</p>
          <p class="text-xs text-gray-400 dark:text-gray-400">{{ $workshop->lokasi }}</p>
        </div>

        <form action="#" method="POST" class="mt-4">
          @csrf
          <button type="submit"
            class="w-full text-sm font-semibold text-white bg-blue-500 hover:bg-blue-600 py-2 rounded-lg transition">
            Daftar
          </button>
        </form>
      </div>
    @empty
      <p class="col-span-3 text-center text-sm text-gray-500">Belum ada workshop tersedia.</p>
    @endforelse
  </div>
</div>
@endsection
