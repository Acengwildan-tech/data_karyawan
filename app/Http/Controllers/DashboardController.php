<?php

namespace App\Http\Controllers; 
 
use App\Models\Karyawan; 
use App\Models\Jabatan; 
 
class DashboardController extends Controller 
{ 
    public function index() 
    { 
        return view('dashboard', [ 
            'totalKaryawan' => Karyawan::count(), 
            'totalJabatan' => Jabatan::count() 
        ]); 
    } 
}