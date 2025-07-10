<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\PembayaranLunas;
use App\Mail\PembayaranLunasMail;
use Illuminate\Support\Facades\Mail;


class AdminPendaftarController extends Controller
{
    public function index()
    {
        $pendaftarans = Pendaftaran::with(['user', 'workshop'])->paginate(10);
return view('admin.pendaftar', compact('pendaftarans'));

    }
    
public function setLunas($id)
{
    $pendaftaran = Pendaftaran::with(['user', 'workshop'])->findOrFail($id);

    $pendaftaran->status_pembayaran = 'lunas';
    $pendaftaran->save();

    // Kirim email ke user
    Mail::to($pendaftaran->user->email)->send(new PembayaranLunasMail($pendaftaran));

    return redirect()->back()->with('success', 'Status pembayaran ditandai sebagai lunas dan email telah dikirim.');
}

}
