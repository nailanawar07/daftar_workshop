@extends('layouts.user.argon')

@section('content')
<div class="max-w-5xl mx-auto mt-20 px-4" style="margin-left: 300px">
    <h2 class="text-xl font-bold mb-4">Workshop Saya</h2>

    @forelse ($pendaftarans as $pendaftaran)
    @if ($pendaftaran->workshop)
        <div class="bg-white shadow rounded p-4 mb-4 border border-gray-200">
            <h3 class="text-lg font-semibold">{{ $pendaftaran->workshop->judul }}</h3>
            <p><strong>Pemateri:</strong> {{ $pendaftaran->workshop->pemateri }}</p>
            <p><strong>Waktu:</strong> {{ \Carbon\Carbon::parse($pendaftaran->workshop->waktu)->format('d M Y H:i') }}</p>
            <p><strong>Status Pembayaran:</strong> 
                <span class="px-2 py-1 rounded text-sm 
                    @if($pendaftaran->status_pembayaran == 'lunas') bg-green-100 text-green-700
                    @elseif($pendaftaran->status_pembayaran == 'menunggu_verifikasi') bg-yellow-100 text-yellow-700
                    @else bg-red-100 text-red-700 @endif">
                    {{ ucfirst(str_replace('_', ' ', $pendaftaran->status_pembayaran)) }}
                </span>
            </p>
            
            

            @if ($pendaftaran->workshop->harga > 0 && !$pendaftaran->bukti_pembayaran)
            <a href="{{ route('user.daftar', $pendaftaran->workshop->id) }}" class="mt-2 inline-block text-indigo-600 hover:underline">Upload Bukti Pembayaran</a>
        @endif
        
        </div>
    @endif
@empty
    <p>Kamu belum mendaftar workshop manapun.</p>
@endforelse

</div>
@endsection
