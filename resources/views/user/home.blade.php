@extends('layouts.user.argon')
@section('title', 'Beranda')

@section('content')
<style>
  .card {
  width: 190px;
  height: 254px;
  border-radius: 20px;
  background: #f5f5f5;
  position: relative;
  padding: 1.8rem;
  border: 2px solid #c3c6ce;
  transition: 0.5s ease-out;
  overflow: visible;
  margin-bottom: 30px;
  margin-left: 2px;
  margin-right: 2px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.card-details {
  color: black;
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  align-items: flex-start;
  gap: 0.3rem;
  height: 100%;
  text-align: left;
}

.card-button {
  transform: translate(-50%, 125%);
  width: 70%;
  border-radius: 1rem;
  border: none;
  background-color: #008bf8;
  color: #fff;
  font-size: 1rem;
  padding: .5rem 1rem;
  position: absolute;
  left: 50%;
  bottom: 0;
  opacity: 0;
  transition: 0.3s ease-out;
}

  .text-body {
  color: rgb(90, 90, 90);
  font-size: 0.85rem;
  line-height: 0.5rem;
}

  .text-title {
  font-size: 1.2em;
  font-weight: bold;
  margin-bottom: 6px;
  white-space: normal;
}

.card:hover {
  border-color: #008bf8;
  box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
}


.card:hover .card-button {
  transform: translate(-50%, 50%);
  opacity: 1;
}

  .kecil {
  font-size: 0.75rem;
  color: #666;
}
.modall {
  background: linear-gradient(135deg, #fdfbfb, #ebedee);
  border-radius: 20px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
  overflow: hidden;
  color: #333;
  font-family: 'Inter', sans-serif;
}

.modall .p-6 {
  padding: 2rem;
}

.modall h3 {
  color: #1f2937; /* dark gray */
}

.modall p {
  font-size: 0.95rem;
  line-height: 1.6;
}

.modall span {
  font-weight: 500;
  color: #4f46e5; /* indigo-600 */
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

<main class="relative h-full transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
  <div class="w-full px-6 mx-auto mt-20">
    <div class="flex flex-wrap justify-center gap-6">
      @foreach ($workshops as $workshop)
      <div class="card">
        <div class="card-details">
          <p class="text-title">{{ $workshop->judul }}</p><br>
          <p class="text-body">{{ $workshop->pemateri }}</p>
          <p class="text-body kecil flex items-center gap-1">
            🗓️ <span>{{ $workshop->waktu }}</span>
          </p>
          <p class="text-body kecil flex items-center gap-1">
            📍 <span>{{ $workshop->lokasi }}</span>
          </p>
        </div>
      
        <!-- Tombol trigger modal -->
        <button type="button"
                data-modal-target="modal-{{ $workshop->id }}"
                data-modal-toggle="modal-{{ $workshop->id }}"
                class="card-button">
          Selengkapnya
        </button>
      </div>
      
    
      <!-- Modal ditempatkan setelah kartu -->
      <div id="modal-{{ $workshop->id }}" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-[9999] flex items-center justify-center belakang">
   
        <div class="relative modall backdrop-blur-md border border-gray-200 rounded-2xl shadow-xl w-full max-w-md transition-all" style="width: 500px">
          
          <!-- Header -->
          <div class="flex justify-between items-center p-6 border-b border-gray-200 rounded-t-2xl">
            <h3 class="text-2xl font-semibold text-gray-800">{{ $workshop->judul }}</h3>
            <button type="button" data-modal-hide="modal-{{ $workshop->id }}" class="text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-full p-2 transition">
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
              </svg>
            </button>
          </div>
      
          <!-- Body -->
          <div class="p-6 space-y-3 text-gray-700 text-[15px]">
            <p>Pemateri :<span class="font-medium text-blue-700">{{ $workshop->pemateri }}</p>
              <p>Waktu :<span class="font-medium text-blue-700">{{ $workshop->waktu }}</p>
                <p>Lokasi :<span class="font-medium text-blue-700">{{ $workshop->lokasi }}</p>
            <p>Detail :<span class="font-medium text-blue-700">{{ $workshop->detail }}</p>
              <p>Harga :<span class="font-medium text-blue-700">{{ $workshop->harga }}</p>
          </div>
      
          <!-- Footer -->
          <div class="flex justify-end p-6 border-t border-gray-200 rounded-b-2xl">
            <a href="{{ route('user.daftar', ['id' => $workshop->id]) }}" class="bg-gradient-to-r from-indigo-500 to-purple-500 text-white px-5 py-2 rounded-full shadow hover:opacity-90 transition daftar" data-modal-hide="modal-{{ $workshop->id }}" style="color: #1f2937">Daftar</a>
            
          </div>
      
        </div>
      </div>
      
    @endforeach
    
    </div>
  </div>
</main>

<!-- Flowbite -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>

@endsection

