<?php

namespace App\Http\Controllers\User;

use App\Models\Workshop;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        $workshop = Workshop::findOrFail($id);

        $pendaftaran = Pendaftaran::where('user_id', $user->id)
                        ->where('workshop_id', $id)
                        ->first();

        if ($workshop->harga == 0) {
            if ($pendaftaran) {
                $pendaftaran->update([
                    'status_pembayaran' => 'lunas',
                    'bukti_pembayaran' => null,
                ]);
            } else {
                $pendaftaran = Pendaftaran::create([
                    'user_id' => $user->id,
                    'workshop_id' => $id,
                    'status_pembayaran' => 'lunas',
                    'bukti_pembayaran' => null,
                ]);
            }

            Mail::to($user->email)->send(new \App\Mail\PembayaranLunasMail($pendaftaran));

            return redirect()->route('user.myworkshop')->with('success', 'Berhasil mendaftar. Status langsung lunas.');
        }

        $filename = null;
        $status = 'belum';

        if ($request->hasFile('bukti_pembayaran')) {
            $request->validate([
                'bukti_pembayaran' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $file = $request->file('bukti_pembayaran');
            $filename = time() . '_' . $file->getClientOriginalName();
            
            //  

            $destinationPath = storage_path('app/public/bukti_pembayaran');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            
            $file->move($destinationPath, $filename);
            $status = 'menunggu_verifikasi';
        }

        if ($pendaftaran) {
            $pendaftaran->update([
                'bukti_pembayaran' => $filename ?? $pendaftaran->bukti_pembayaran,
                'status_pembayaran' => $status,
            ]);
        } else {
            Pendaftaran::create([
                'user_id' => $user->id,
                'workshop_id' => $id,
                'status_pembayaran' => $status,
                'bukti_pembayaran' => $filename,
            ]);
        }

        return redirect()->route('user.myworkshop')->with('success', 'Pendaftaran berhasil! Bukti pembayaran menunggu verifikasi.');
    }
}