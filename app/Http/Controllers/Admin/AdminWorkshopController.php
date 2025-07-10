<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workshop;

class AdminWorkshopController extends Controller
{
    public function index()
{
    $workshops = Workshop::with('pendaftarans')->latest()->paginate(10);
    return view('admin.myworkshop.index', compact('workshops'));
}


    public function create()
    {
        return view('admin.myworkshop.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'pemateri' => 'required|string|max:255',
        'waktu' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'detail' => 'required',           
        'harga' => 'required|integer|min:0' 
    ]);
    

    Workshop::create($request->all());

    return redirect()->route('admin.myworkshop.index')->with('success', 'Workshop berhasil ditambahkan!');
}


    public function edit($id)
{
    $workshop = Workshop::findOrFail($id);
    return view('admin.myworkshop.edit', compact('workshop'));
}

public function update(Request $request, $id)
{
    $workshop = Workshop::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'pemateri' => 'required|string|max:255',
        'waktu' => 'required|date',
        'lokasi' => 'required|string|max:255',
        'detail' => 'required',
        'harga' => 'required|integer|min:0',
    ]);

    $workshop->update($request->all());

    return redirect()->route('admin.myworkshop.index')->with('success', 'Workshop berhasil diupdate!');
}


public function destroy($id)
{
    $workshop = Workshop::findOrFail($id);
    $workshop->delete();

    return redirect()->route('admin.myworkshop.index')->with('success', 'Workshop berhasil dihapus!');
}


}
