<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PembayaranLunas;

class AdminPendaftarController extends Controller
{
    public function index()
{
    $pendaftarans = Pendaftaran::with(['user', 'workshop'])->latest()->get();
    return view('admin.pendaftar', compact('pendaftarans'));
}

public function setLunas($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status_pembayaran = 'lunas';
    $pendaftaran->save();

    // Kirim notifikasi email
    $pendaftaran->user->notify(new PembayaranLunas());

    return back()->with('success', 'Status pembayaran diubah menjadi lunas dan email telah dikirim.');
}
}
