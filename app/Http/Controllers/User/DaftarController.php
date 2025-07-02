<?php

namespace App\Http\Controllers\User;

use App\Models\Workshop;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DaftarController extends Controller
{
    public function index($id)
{
    $workshop = Workshop::findOrFail($id);
    return view('user.daftar', compact('workshop'));
}
public function store(Request $request, $id)
{
    $user = Auth::user();

    // Cek apakah user sudah daftar workshop ini
    $pendaftaran = Pendaftaran::where('user_id', $user->id)
                    ->where('workshop_id', $id)
                    ->first();

    $filename = null;
    $status = 'belum';

    if ($request->hasFile('bukti_pembayaran')) {
        $request->validate([
            'bukti_pembayaran' => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $file = $request->file('bukti_pembayaran');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/bukti_pembayaran', $filename);

        $status = 'menunggu_verifikasi';
    }

    if ($pendaftaran) {
        // ✅ Update kalau sudah pernah daftar
        $pendaftaran->update([
            'bukti_pembayaran' => $filename ?? $pendaftaran->bukti_pembayaran,
            'status_pembayaran' => $status,
        ]);
    } else {
        // 🆕 Buat baru kalau belum pernah daftar
        Pendaftaran::create([
            'user_id' => $user->id,
            'workshop_id' => $id,
            'status_pembayaran' => $status,
            'bukti_pembayaran' => $filename,
        ]);
    }

    return redirect()->route('user.myworkshop')->with('success', 'Pendaftaran berhasil!');
}


}
