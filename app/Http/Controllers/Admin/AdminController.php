<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PembayaranLunas;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function konfirmasiLunas($id)
{
    $pendaftaran = Pendaftaran::findOrFail($id);
    $pendaftaran->status_pembayaran = 'lunas';
    $pendaftaran->save();

    // Kirim email ke user yang mendaftar
    $pendaftaran->user->notify(new PembayaranLunas());

    return back()->with('success', 'Status diubah jadi lunas dan email telah dikirim.');
}
}
