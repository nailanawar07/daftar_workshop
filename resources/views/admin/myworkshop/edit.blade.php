


@extends('layouts.admin.argon')

@section('content')
<main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="max-w-5xl mx-auto px-6 py-10">
    <div class="bg-white border border-gray-200 rounded-xl shadow-lg px-8 py-10">

    <br>

      <form action="{{ route('admin.myworkshop.update', $workshop->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Workshop</label>
            <input type="text" name="judul" id="judul" placeholder="masukkan judul" value="{{ old('judul', $workshop->judul) }}"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">
          </div>
<br>
          <div>
            <label for="pemateri" class="block text-sm font-medium text-gray-700 mb-1">Pemateri</label>
            <input type="text" name="pemateri" id="pemateri" placeholder="masukkan pemateri" value="{{ old('pemateri', $workshop->pemateri) }}"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">
          </div>
<br>
          <div>
            <label for="waktu" class="block text-sm font-medium text-gray-700 mb-1">Waktu</label>
            <input type="datetime-local" name="waktu" id="waktu" value="{{ old('waktu', \Carbon\Carbon::parse($workshop->waktu)->format('Y-m-d\TH:i')) }}"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">
          </div>
<br>
          <div>
            <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
            <input type="text" name="lokasi" id="lokasi" placeholder="masukkan lokasi" value="{{ old('lokasi', $workshop->lokasi) }}"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">
          </div>
          <div>
            <label for="detail" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi / Detail Workshop</label>
            <textarea name="detail" id="detail" rows="4"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">{{ old('detail', $workshop->detail) }}</textarea>
          </div>
          <div>
            <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga Workshop (Rp)</label>
            <input type="number" name="harga" id="harga" placeholder="Contoh: 50000" value="{{ old('harga', $workshop->harga) }}"
              class="w-full rounded-md border border-gray-300 bg-gray-50 px-4 py-2 focus:border-blue-500 focus:ring focus:ring-blue-100 text-sm">
          </div>
                    
        </div>

        <div class="flex justify-end space-x-4 pt-8 mt-6 border-t pt-6">
            {{-- Tombol Simpan --}}
            <button type="submit"
              style="background-color: #2563eb; color: white; padding: 10px 24px; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 500;"
              class="shadow hover:opacity-90 transition ml-4">
              Simpan
            </button>
          
            {{-- Tombol Batal --}}
            <a href="{{ route('admin.myworkshop.index') }}"
              style="background-color: #e5e7eb; color: #374151; padding: 10px 24px; border-radius: 0.375rem; font-size: 0.875rem; font-weight: 500;"
              class="shadow hover:bg-gray-300 transition ml-4">
              Batal
            </a>
          </div>
          
          
          
          
          
      </form>
<br>
    </div>
  </div>
</main>
@endsection
