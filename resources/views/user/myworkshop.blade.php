@extends('layouts.user.argon')
@section('title', 'WorkshopKu')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-16" style="margin-left: 300px">
    

    @forelse ($pendaftarans as $pendaftaran)
        @if ($pendaftaran->workshop)
            <div class="bg-white border border-gray-300 shadow-lg rounded-3xl p-6 mb-8 transition hover:shadow-xl">
                <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                    <div class="flex-1 space-y-2">
                        <h3 class="text-2xl font-semibold text-indigo-700">{{ $pendaftaran->workshop->judul }}</h3>
                        <p class="text-gray-700"><span class="font-medium">📌 Pemateri:</span> {{ $pendaftaran->workshop->pemateri }}</p>
                        <p class="text-gray-700"><span class="font-medium">📍 Lokasi:</span> {{ $pendaftaran->workshop->lokasi }}</p>
                        <p class="text-gray-700"><span class="font-medium">📝 Detail:</span> {{ $pendaftaran->workshop->detail }}</p>
                        <p class="text-gray-700"><span class="font-medium">🕒 Waktu:</span> {{ \Carbon\Carbon::parse($pendaftaran->workshop->waktu)->format('d M Y H:i') }}</p>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-8 text-center md:text-right">
                        <p class="text-sm font-medium text-gray-600 mb-2">Status Pembayaran</p>
                        <span class="px-4 py-2 text-sm rounded-full font-semibold 
                            @if($pendaftaran->status_pembayaran == 'lunas') bg-green-200 text-green-800
                            @elseif($pendaftaran->status_pembayaran == 'menunggu_verifikasi') bg-yellow-200 text-yellow-800
                            @else bg-red-200 text-red-800 @endif">
                            {{ ucfirst(str_replace('_', ' ', $pendaftaran->status_pembayaran)) }}
                        </span>

                        @if ($pendaftaran->workshop->harga > 0 && !$pendaftaran->bukti_pembayaran)
                            <div class="mt-3">
                                <a href="{{ route('user.daftar', $pendaftaran->workshop->id) }}" class="inline-block px-4 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 transition">
                                    Upload Bukti Pembayaran
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    @empty
        <div class="bg-indigo-50 text-indigo-700 text-center p-8 rounded-2xl shadow-sm">
            <p class="text-lg font-medium">Kamu belum mendaftar workshop manapun. ✨</p>
        </div>
    @endforelse
</div>
@endsection
