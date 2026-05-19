<?php

namespace App\Http\Controllers; 
 
use App\Models\Jabatan; 
use App\Http\Requests\StoreJabatanRequest; 
use App\Http\Requests\UpdateJabatanRequest; 
 
class JabatanController extends Controller 
{ 
    public function index() 
    { 
        $jabatans = Jabatan::latest()->get(); 
        return view('jabatan.index', compact('jabatans')); 
    } 
 
    public function create() 
    { 
        return view('jabatan.create'); 
    } 
 
    public function store(StoreJabatanRequest $request) 
    { 
        Jabatan::create($request->validated()); 
 
        return redirect() 
            ->route('jabatan.index') 
            ->with('success', 'Data jabatan berhasil ditambahkan'); 
    } 
 
    public function edit(Jabatan $jabatan) 
    { 
        return view('jabatan.edit', compact('jabatan')); 
    } 
 
    public function update(UpdateJabatanRequest $request, Jabatan $jabatan) 
    { 
        $jabatan->update($request->validated()); 
 
        return redirect() 
            ->route('jabatan.index') 
            ->with('success', 'Data jabatan berhasil diupdate'); 
    } 
 
    public function destroy(Jabatan $jabatan) 
    { 
        $jabatan->delete(); 
 
        return redirect() 
            ->route('jabatan.index') 
            ->with('success', 'Data jabatan berhasil dihapus'); 
    } 
}