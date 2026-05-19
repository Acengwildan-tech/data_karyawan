<?php

namespace App\Http\Controllers; 
 
use App\Models\Karyawan; 
use App\Models\User; 
use App\Models\Jabatan; 
use App\Http\Requests\StoreKaryawanRequest; 
use App\Http\Requests\UpdateKaryawanRequest; 
 
class KaryawanController extends Controller 
{ 
    public function index() 
    { 
        $karyawans = Karyawan::with(['user', 'jabatan']) 
                        ->latest() 
                        ->get(); 
 
        return view('karyawan.index', compact('karyawans')); 
    } 
 
    public function create() 
    { 
        $users = User::all(); 
        $jabatans = Jabatan::all(); 
 
        return view('karyawan.create', compact('users', 'jabatans')); 
    } 

    public function store(StoreKaryawanRequest $request) 
    { 
        Karyawan::create($request->validated()); 
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan'); 
    } 

    public function edit(Karyawan $karyawan) 
    { 
        $jabatans = Jabatan::all(); 
        return view('karyawan.edit', compact('karyawan', 'jabatans')); 
    } 

    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan) 
    { 
        $karyawan->update($request->validated()); 
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diupdate'); 
    } 

    public function destroy(Karyawan $karyawan) 
    { 
        $karyawan->delete(); 
        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }

    public function exportPdf()
    {
        $karyawans = Karyawan::with(['user', 'jabatan'])->get();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('karyawan.export_pdf', compact('karyawans'));
        return $pdf->download('data_karyawan_' . date('Y-m-d') . '.pdf');
    }

    public function exportExcel()
    {
        $karyawans = Karyawan::with(['user', 'jabatan'])->get();
        return response(view('karyawan.export_excel', compact('karyawans')))
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="data_karyawan_' . date('Y-m-d') . '.xls"');
    }
}