@extends('layouts.admin.argon')

@section('content')
<main class="relative h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl overflow-hidden">
  <div class="w-full px-4 mx-auto pt-10">
    <div class="flex flex-wrap -mx-3">

      {{-- FORM PROFIL & PASSWORD --}}
      <div class="w-full max-w-full px-3 md:w-8/12 space-y-4">

        {{-- CARD: Edit Profil --}}
        <div class="bg-white rounded-xl shadow p-4">
          <h5 class="text-slate-700 font-semibold text-sm mb-3">Edit Profil</h5>
          <form method="POST" action="{{ route('admin.profil.update') }}" class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @csrf
            @method('PUT')

            <div>
              <label class="block text-xs font-medium text-slate-600 mb-1">Nama</label>
              <input type="text" name="name" value="{{ Auth::user()->name }}"
                class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>

            <div>
              <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
              <input type="email" name="email" value="{{ Auth::user()->email }}"
                class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div><br>

            <div class="col-span-2 text-right mt-2">
              <button type="submit"
                class="bg-blue-500 text-white text-xs px-4 py-2.5 rounded shadow hover:shadow-md transition">
                Simpan Perubahan
              </button>
            </div>
          </form>
        </div><br>

        {{-- CARD: Ganti Password --}}
        <div class="bg-white rounded-xl shadow p-4">
          <h5 class="text-slate-700 font-semibold text-sm mb-3">Ganti Password</h5>
          <form method="POST" action="{{ route('password.update') }}" class="grid grid-cols-1 md:grid-cols-2 gap-3">
            @csrf
            @method('PUT')

            <div>
              <label class="block text-xs font-medium text-slate-600 mb-1">Password Saat Ini</label>
              <input type="password" name="current_password" required
                class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>

            <div>
              <label class="block text-xs font-medium text-slate-600 mb-1">Password Baru</label>
              <input type="password" name="password" required
                class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div>

            <div>
              <label class="block text-xs font-medium text-slate-600 mb-1">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" required
                class="w-full rounded border border-gray-300 bg-white px-2 py-1 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition" />
            </div><br>

            <div class="col-span-2 text-right mt-2">
              <button type="submit"
                class="bg-blue-500 text-white text-xs px-4 py-2.5 rounded shadow hover:shadow-md transition">
                Ganti Password
              </button>
            </div>
          </form>
        </div>

      </div>

      {{-- SIDEBAR PROFIL --}}
      <div class="w-full max-w-full px-3 md:w-4/12">
        <div class="bg-white rounded-xl shadow p-4 h-full flex flex-col items-center text-center">

          {{-- Cover --}}
          <img class="rounded-lg object-cover mb-3" style="height: 260px; width: 100%; object-position: center;"
            src="{{ asset('assets/argon/img/kartini.jpg') }}" alt="cover">

          {{-- Info --}}
          <div class="text-xs text-slate-600 mt-2">
            <p><strong>Role:</strong> {{ ucfirst(Auth::user()->role ?? 'admin') }}</p>
            <p><strong>Bergabung:</strong> {{ Auth::user()->created_at->format('d M Y') }}</p>
          </div>

        </div>
      </div>

    </div>
  </div>
</main>
@endsection
