<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;

class AdminWorkshopController extends Controller
{
    public function index()
    {
        $workshops = Workshop::latest()->paginate(10);
        return view('admin.myworkshop.index', compact('workshops'));
    }

    public function create()
    {
        return view('admin.myworkshop.create');
    }

    public function store(Request $request)
    {
        Workshop::create($request->all());
        return redirect()->route('admin.myworkshop.index')->with('success', 'Workshop berhasil ditambahkan!');

    }
}
