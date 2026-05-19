@extends('layouts.app') 

@section('content') 
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Data Jabatan</h1> 
            <p class="text-sm text-slate-500 mt-1">Kelola daftar nama jabatan dan struktur peran organisasi di instansi Anda.</p>
        </div>
        <a href="/jabatan/create" class="inline-flex items-center gap-2 px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold transition shadow-md hover:shadow-indigo-500/10 hover:scale-[1.02] active:scale-[0.98]">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Jabatan</span>
        </a> 
    </div>

    <!-- Table Card Wrapper -->
    <div class="bg-gradient-to-br from-indigo-50/75 via-indigo-50/40 to-purple-50/50 rounded-3xl border border-indigo-100/60 shadow-md overflow-hidden">
        <table class="w-full text-left border-collapse"> 
            <thead> 
                <tr class="bg-indigo-900/10 border-b border-indigo-100 text-indigo-800 text-xs font-bold uppercase tracking-wider"> 
                    <th class="p-6 w-16">No</th> 
                    <th class="p-6">Nama Jabatan</th> 
                    <th class="p-6 text-right w-44">Aksi</th> 
                </tr> 
            </thead> 
            <tbody class="divide-y divide-indigo-100/60"> 
                @foreach ($jabatans as $j) 
                <tr class="hover:bg-indigo-900/5 transition"> 
                    <td class="p-6 font-semibold text-slate-500">{{ $loop->iteration }}</td> 
                    <td class="p-6 font-bold text-slate-800">{{ $j->nama_jabatan }}</td> 
                    <td class="p-6 text-right"> 
                        <div class="flex items-center justify-end gap-3">
                            <a href="/jabatan/{{ $j->id }}/edit" class="px-3 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg font-bold text-xs transition">Edit</a> 
                            <form action="/jabatan/{{ $j->id }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jabatan ini?')"> 
                                @csrf @method('DELETE') 
                                <button class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg font-bold text-xs transition">Hapus</button> 
                            </form> 
                        </div>
                    </td> 
                </tr> 
                @endforeach 
            </tbody> 
        </table> 
    </div>
</div>
@endsection
