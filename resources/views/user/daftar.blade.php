@extends('layouts.user.argon')

@section('content')
<script src="https://unpkg.com/tailwindcss-jit-cdn"></script>

<script type="tailwind-config">
{
  theme: {
    extend: {
      colors: {
        gray: colors.blueGray,
      }
    }
  }
}
</script>

<section class="flex-1 px-4">
  <div class="container mx-auto">
    <div class="bg-indigo-600 shadow-lg rounded-lg" style="width: 970px">
      <div class="px-6 py-5">
        <div class="mb-4">
            <a href="{{ route('user.home') }}"
               class="inline-flex items-center text-sm font-medium text-indigo-100 hover:text-white transition">
              ← Kembali ke Daftar Workshop
            </a>
          </div>
          
        <div class="flex items-start">
          <!-- Icon -->
          <svg class="fill-current flex-shrink-0 mr-5" width="30" height="30" viewBox="0 0 30 30">
            <path class="text-indigo-300" d="m16 14.883 14-7L14.447.106a1 1 0 0 0-.895 0L0 6.883l16 8Z" />
            <path class="text-indigo-200" d="M16 14.619v15l13.447-6.724A.998.998 0 0 0 30 22V7.619l-14 7Z" />
            <path class="text-indigo-500" d="m16 14.619-16-8V21c0 .379.214.725.553.895L16 29.619v-15Z" />
          </svg>
          <!-- Content -->
          <div class="flex-grow truncate">
            <div class="w-full sm:flex justify-between items-center mb-3">
              <h2 class="text-2xl leading-snug font-extrabold text-gray-50 truncate mb-1 sm:mb-0">{{ $workshop->judul }}</h2>
              <span class="text-indigo-100 text-sm">{{ \Carbon\Carbon::parse($workshop->waktu)->format('d M Y H:i') }}</span>
            </div>
            <div class="text-indigo-100 space-y-1">
              <p><strong>Pemateri:</strong> {{ $workshop->pemateri }}</p>
              <p><strong>Lokasi:</strong> {{ $workshop->lokasi }}</p>
              <p class="mt-2">{{ $workshop->detail }}</p>
            </div>
            
            <form action="{{ route('user.daftar.store', $workshop->id) }}" method="POST" enctype="multipart/form-data" class="mt-6">
              @csrf
              <label class="block text-indigo-50 mb-2 text-sm font-medium">Upload Bukti Pembayaran</label>
              <input type="file" name="bukti_pembayaran" accept="image/*"
                  class="block w-full text-sm text-white bg-indigo-500 border border-white rounded-lg cursor-pointer file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-white file:text-indigo-600 hover:file:bg-gray-100" >
          
              <button type="submit"
                  class="mt-5 bg-gradient-to-r from-indigo-200 to-indigo-300 text-indigo-800 font-bold py-2 px-4 rounded hover:opacity-90 transition w-full">
                  Kirim Pendaftaran
              </button>
          </form>
          
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection