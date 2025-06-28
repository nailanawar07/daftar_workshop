<?php

namespace App\Http\Controllers\User;

use App\Models\Workshop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $workshops = Workshop::all();
        return view('user.home', compact('workshops'));
    }
}
