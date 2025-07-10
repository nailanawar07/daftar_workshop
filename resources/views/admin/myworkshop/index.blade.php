@extends('layouts.admin.argon')

@section('content')
<style>
  .modall {
    background: #819A91;
  }
  .belakang {
    background-color: rgba(0, 0, 0, 0.5);
    backdrop-filter: blur(8px) saturate(150%);
    width: 100vw;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 40;
  }
  .dropdown-box {
  position: absolute;
  top: -200%; /* muncul di bawah tombol */
  left: -95px; /* menjorok ke kiri */
  margin-top: 4px;
  min-width: 80px;
  background: white;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  z-index: 999;
}



</style>

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="w-full max-w-6xl px-4 py-4 mx-auto">
    
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

    <div class="bg-white rounded-xl shadow-lg px-5 py-3 max-h-[60vh] overflow-y-visible">

      <table class="w-full text-xs table-auto">
        <thead class="text-blue-700 font-semibold border-b">
          <tr>
            <th class="py-2 text-left w-8">No</th>
            <th class="py-2 text-left">Judul</th>
            <th class="py-2 text-left">Pemateri</th>
            <th class="py-2 text-left">Harga</th>
            <th class="py-2 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          @foreach ($workshops as $workshop)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-1">{{ ($workshops->currentPage() - 1) * $workshops->perPage() + $loop->iteration }}</td>
            <td class="py-1 truncate">{{ $workshop->judul }}</td>
            <td class="py-1 truncate">{{ $workshop->pemateri }}</td>
            <td class="py-1">Rp{{ number_format($workshop->harga, 0, ',', '.') }}</td>
            <td class="py-1 text-center relative">
              <div x-data="{ open: false }" class="relative inline-block text-left">
                <button @click="open = !open" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M6 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                  </svg>
                </button>
                <div x-show="open" @click.away="open = false"
     class="dropdown-box"
>


                  <div class="py-1 text-sm text-left text-gray-700">
                    <button type="button" data-modal-target="modal-{{ $workshop->id }}" data-modal-toggle="modal-{{ $workshop->id }}" class="block px-1 py-1 hover:bg-gray-100">Detail</button>
                    <a href="{{ route('admin.myworkshop.edit', $workshop->id) }}" class="block px-1 py-1 hover:bg-gray-100">Edit</a>
                    <form action="{{ route('admin.myworkshop.destroy', $workshop->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="block w-full text-left px-1 py-1 hover:bg-gray-100 text-red-600">Hapus</button>
                    </form>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div><br>

    <div class="mt-3 text-xs text-gray-600">
      {{ $workshops->links() }}
    </div>

  </div>
</main>
@endsection

@section('modals')
@foreach ($workshops as $workshop)
<div id="modal-{{ $workshop->id }}" tabindex="-1" aria-hidden="true"
     class="hidden fixed inset-0 z-[9999] flex items-center justify-center belakang">
  <div class="relative modall border border-gray-200 rounded-2xl shadow-xl w-full max-w-md transition-all" style="width: 500px">

    <div class="flex justify-between items-center p-6 border-b border-gray-200 rounded-t-2xl">
      <h3 class="text-2xl font-semibold text-gray-800">{{ $workshop->judul }}</h3>
      <button type="button" data-modal-hide="modal-{{ $workshop->id }}" class="text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-full p-2 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </button>
    </div>

    <div class="p-6 space-y-3 text-gray-700 text-[15px]">
      <p><strong>Pemateri:</strong> {{ $workshop->pemateri }}</p>
      <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($workshop->waktu)->format('d M Y H:i') }}</p>
      <p><strong>Lokasi:</strong> {{ $workshop->lokasi }}</p>
      <p><strong>Harga:</strong> Rp{{ number_format($workshop->harga, 0, ',', '.') }}</p>
      <p><strong>Detail:</strong><br><span class="font-medium text-blue-700">{{ $workshop->detail }}</span></p>
      <p><strong>Jumlah Pendaftar:</strong> {{ $workshop->pendaftarans->count() }} orang</p>

    </div>

    
  </div>
</div>
@endforeach
@endsection
