<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorkshopController extends Controller
{
    // Untuk halaman /user/home
    public function index()
{
    $user = Auth::user();

    $workshops = Workshop::where('waktu', '>=', now())
        ->whereDoesntHave('pendaftarans', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
        ->orderBy('waktu')
        ->get();

    return view('user.home', compact('workshops'));
}


    // Untuk halaman /user/myworkshop
    public function myWorkshop()
{
    $user = Auth::user();

    $pendaftarans = $user->pendaftarans()->with('workshop')->get();

    return view('user.myworkshop', compact('pendaftarans'));
}



}