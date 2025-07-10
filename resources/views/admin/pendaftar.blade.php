@extends('layouts.admin.argon')

@section('content')
<style>
  .dropdown-box {
    position: absolute;
    top: -200%;
    left: -95px;
    margin-top: 4px;
    min-width: 80px;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    z-index: 999;
  }
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
</style>

<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="w-full max-w-6xl px-4 py-4 mx-auto">
    
    <div class="bg-white border border-gray-200 rounded-lg px-5 py-4 mb-4 shadow">
      <h2 class="text-gray-800 text-base font-semibold">Data Pendaftar Workshop</h2>
      <p class="text-gray-500 text-xs mt-0.5">Kelola peserta dan bukti pembayaran</p>
    </div>

    <div class="bg-white rounded-xl shadow-lg px-5 py-3 max-h-[60vh] overflow-y-visible">
      <table class="w-full text-xs table-auto">
        <thead class="text-blue-700 font-semibold border-b">
          <tr>
            <th class="py-2 text-left w-8">No</th>
            <th class="py-2 text-left">Nama</th>
            <th class="py-2 text-left">Workshop</th>
            <th class="py-2 text-left">Waktu</th>
            <th class="py-2 text-left">Status</th>
            <th class="py-2 text-center">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-gray-800">
          @foreach ($pendaftarans as $i => $p)
          <tr class="border-b hover:bg-gray-50">
            <td class="py-2">{{ ($pendaftarans->currentPage() - 1) * $pendaftarans->perPage() + $loop->iteration }}</td>
            <td class="py-2">{{ $p->user->name }}</td>
            <td class="py-2">{{ $p->workshop->judul }}</td>
            <td class="py-2">{{ \Carbon\Carbon::parse($p->workshop->waktu)->format('d M Y H:i') }}</td>
            <td class="py-2">
              @if (!$p->bukti_pembayaran)
                <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">Belum bayar</span>
              @else
                <span class="px-2 py-1 text-xs rounded
                  @if($p->status_pembayaran == 'lunas') bg-green-100 text-green-700
                  @elseif($p->status_pembayaran == 'menunggu_verifikasi') bg-yellow-100 text-yellow-700
                  @else bg-red-100 text-red-700 @endif">
                  {{ ucfirst(str_replace('_', ' ', $p->status_pembayaran)) }}
                </span>
              @endif
            </td>
            <td class="py-2 text-center relative">
                @if ($p->bukti_pembayaran)
                <div x-data="{ open: false }" class="relative inline-block text-left">
                  <button @click="open = !open" class="text-gray-600 hover:text-gray-900 focus:outline-none">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M6 10a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0z" />
                    </svg>
                  </button>
                  <div x-show="open" @click.away="open = false" class="dropdown-box">
                    <div class="py-1 text-sm text-left text-gray-700">
                      <button type="button" data-modal-target="modal-{{ $p->id }}" data-modal-toggle="modal-{{ $p->id }}" class="block px-2 py-1 hover:bg-gray-100 w-full text-left">Detail</button>
                      
                      @if ($p->status_pembayaran != 'lunas')
                      <form action="{{ route('admin.pendaftar.lunas', $p->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="block w-full text-left px-2 py-1 hover:bg-gray-100 text-green-600">Tandai Lunas</button>
                      </form>
                      @endif
                    </div>
                  </div>
                </div>
                @else
                  <span class="text-gray-400 italic">-</span>
                @endif
              </td>
              
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-3 text-xs text-gray-600">
      {{ $pendaftarans->links() }}
    </div>
  </div>
</main>
@endsection

@section('modals')
@foreach ($pendaftarans as $p)
@if ($p->bukti_pembayaran)
<div id="modal-{{ $p->id }}" tabindex="-1" aria-hidden="true"
     class="hidden fixed inset-0 z-[9999] flex items-center justify-center belakang">
  <div class="relative modall border border-gray-200 rounded-2xl shadow-xl w-full max-w-md transition-all" style="width: 500px">

    <div class="flex justify-between items-center p-6 border-b border-gray-200 rounded-t-2xl">
      <h3 class="text-2xl font-semibold text-gray-800">Bukti Pembayaran</h3>
      <button type="button" data-modal-hide="modal-{{ $p->id }}" class="text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-full p-2 transition">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </button>
    </div>

    <div class="p-5 space-y-3 text-gray-700 text-[15px]">
      <p><strong>Nama:</strong> {{ $p->user->name }}</p>
      <p><strong>Workshop:</strong> {{ $p->workshop->judul }}</p>
      <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($p->workshop->waktu)->format('d M Y H:i') }}</p>
      <p><strong>Bukti:</strong><br>
        <a href="{{ asset('storage/bukti_pembayaran/' . $p->bukti_pembayaran) }}" target="_blank" class="text-blue-600 underline">Lihat File</a>
      </p>

      @if ($p->status_pembayaran != 'lunas')
      <form action="{{ route('admin.pendaftar.lunas', $p->id) }}" method="POST" class="pt-3">
          @csrf
          @method('PUT')
          <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
              Tandai Lunas
          </button>
      </form>
      @endif
      
    </div>

  </div>
</div>
@endif
@endforeach
@endsection

