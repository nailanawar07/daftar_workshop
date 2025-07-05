@extends('layouts.admin.argon')

@section('content')
<div class="p-6" style="margin-left: 300px">
    <h2 class="text-2xl font-bold mb-6">Data Pendaftar Workshop</h2>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="table-auto w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-100 text-sm uppercase text-gray-600">
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Nama User</th>
                    <th class="px-4 py-3">Workshop</th>
                    <th class="px-4 py-3">Waktu</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($pendaftarans as $i => $p)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $i+1 }}</td>
                    <td class="px-4 py-2">{{ $p->user->name }}</td>
                    <td class="px-4 py-2">{{ $p->workshop->judul }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($p->workshop->waktu)->format('d M Y H:i') }}</td>
                    <td class="px-4 py-2">
                        <span class="px-2 py-1 text-sm rounded
                            @if($p->status_pembayaran == 'lunas') bg-green-100 text-green-700
                            @elseif($p->status_pembayaran == 'menunggu_verifikasi') bg-yellow-100 text-yellow-700
                            @else bg-red-100 text-red-700 @endif">
                            {{ ucfirst(str_replace('_', ' ', $p->status_pembayaran)) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        @if ($p->bukti_pembayaran)
                            <a href="{{ asset('storage/bukti_pembayaran/'.$p->bukti_pembayaran) }}" target="_blank"
                               class="text-blue-600 hover:underline mr-2">Detail</a>

                               @if ($p->status_pembayaran != 'lunas')
                               <form action="{{ route('admin.pendaftar.lunas', $p->id) }}" method="POST" class="inline">
                                   @csrf
                                   @method('PUT')
                                   <button type="submit" class="px-3 py-1 bg-green-500 text-gray rounded hover:bg-green-600">
                                       Tandai Lunas
                                   </button>
                               </form>
                               @endif
                               
                        @else
                            <span class="text-gray-400 italic">Belum bayar</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
