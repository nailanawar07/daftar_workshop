@extends('layouts.admin.argon')

@section('content')
<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="w-full max-w-6xl px-4 py-4 mx-auto">
    
    {{-- Header --}}
    <div class="bg-white border border-gray-200 rounded-lg px-5 py-4 mb-4 shadow flex justify-between items-center">
      <div>
        <h2 class="text-gray-800 text-base font-semibold leading-tight">Daftar Workshop</h2>
        <p class="text-gray-500 text-xs mt-0.5">Kelola workshop yang sudah kamu buat</p>
      </div>
    
      <a href="{{ route('admin.myworkshop.create') }}"
   class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-indigo-200 text-indigo-600 text-sm font-semibold shadow-md hover:bg-indigo-50 hover:text-indigo-700 hover:shadow-lg transition-all duration-200">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
  </svg>
  Tambah Workshop
</a>

    </div>
    
    
    
    
    {{-- Tabel --}}
    <div class="bg-white rounded-xl shadow-lg px-5 py-3 max-h-[60vh] overflow-y-auto">
      <table class="w-full text-xs table-auto">
        <thead class="text-blue-700 font-semibold border-b">
          <tr>
            <th class="py-2 text-left w-8">No</th>
            <th class="py-2 text-left">Judul</th>
            <th class="py-2 text-left">Pemateri</th>
            <th class="py-2 text-left">Waktu</th>
            <th class="py-2 text-left">Lokasi</th>
            <th class="py-2 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          @foreach ($workshops as $workshop)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-1">{{ ($workshops->currentPage() - 1) * $workshops->perPage() + $loop->iteration }}</td>
            <td class="py-1 truncate">{{ $workshop->judul }}</td>
            <td class="py-1 truncate">{{ $workshop->pemateri }}</td>
            <td class="py-1">{{ $workshop->waktu }}</td>
            <td class="py-1 truncate">{{ $workshop->lokasi }}</td>
            <td class="py-1 text-center whitespace-nowrap">
              <a href="#" class="text-indigo-600 text-xs hover:underline">Edit</a>
              <span class="mx-1 text-gray-300">|</span>
              <form action="#" method="POST" class="inline">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500 text-xs hover:underline"
                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <br>

    {{-- Pagination --}}
    <div class="mt-3 text-xs text-gray-600">
      {{ $workshops->links() }}
    </div>

  </div>
</main>






{{-- tabel belum dan lunas
<td class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
  <span class="bg-gradient-to-tl from-emerald-500 to-teal-400 px-2.5 text-xs rounded-1.8 py-1.4 inline-block text-white font-bold uppercase">
    {{ $workshop->waktu }}
  </span>
</td> --}}
{{-- <div class="p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Daftar Workshop</h2>
    <table class="min-w-full text-left border">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border">Judul</th>
                <th class="px-4 py-2 border">Pemateri</th>
                <th class="px-4 py-2 border">Waktu</th>
                <th class="px-4 py-2 border">Lokasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workshops as $workshop)
                <tr>
                    <td class="px-4 py-2 border">{{ $workshop->judul }}</td>
                    <td class="px-4 py-2 border">{{ $workshop->pemateri }}</td>
                    <td class="px-4 py-2 border">{{ \Carbon\Carbon::parse($workshop->waktu)->format('d M Y H:i') }}</td>
                    <td class="px-4 py-2 border">{{ $workshop->lokasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}
@endsection
