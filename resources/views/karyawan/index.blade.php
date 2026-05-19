@extends('layouts.app') 

@section('content') 
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Data Karyawan</h1> 
            <p class="text-sm text-slate-500 mt-1">
                @if(auth()->user()->role_id == 1)
                    Kelola biodata, hak akses jabatan, dan informasi kontak seluruh staf organisasi.
                @else
                    Lihat biodata, jabatan, dan informasi kontak rekan kerja staf organisasi Anda.
                @endif
            </p>
        </div>
        
        <!-- Action Buttons (Only for Admin) -->
        @if(auth()->user()->role_id == 1)
        <div class="flex flex-wrap items-center gap-2.5">
            <a href="/karyawan/create" class="inline-flex items-center gap-2 px-4 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-2xl font-bold text-sm transition shadow-sm hover:scale-[1.02] active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                <span>Tambah Karyawan</span>
            </a> 
            <a href="{{ route('karyawan.export.pdf') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-rose-500 hover:bg-rose-600 text-white rounded-2xl font-bold text-sm transition shadow-sm hover:scale-[1.02] active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Cetak PDF</span>
            </a>
            <a href="{{ route('karyawan.export.excel') }}" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white rounded-2xl font-bold text-sm transition shadow-sm hover:scale-[1.02] active:scale-[0.98]">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>Ekspor Excel</span>
            </a>
        </div>
        @endif
    </div>

    <!-- Table Card Wrapper -->
    <div class="bg-gradient-to-br from-indigo-50/75 via-indigo-50/40 to-purple-50/50 rounded-3xl border border-indigo-100/60 shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse min-w-[700px]"> 
                <thead> 
                    <tr class="bg-indigo-900/10 border-b border-indigo-100 text-indigo-800 text-xs font-bold uppercase tracking-wider"> 
                        <th class="p-6 w-16">No</th> 
                        <th class="p-6">Nama Karyawan</th> 
                        <th class="p-6">Jabatan</th> 
                        <th class="p-6">Alamat</th> 
                        <th class="p-6">No HP</th> 
                        @if(auth()->user()->role_id == 1)
                        <th class="p-6 text-right w-44">Aksi</th> 
                        @endif
                    </tr> 
                </thead> 
                <tbody class="divide-y divide-indigo-100/60"> 
                    @foreach ($karyawans as $k) 
                    <tr class="hover:bg-indigo-900/5 transition"> 
                        <td class="p-6 font-semibold text-slate-500">{{ $loop->iteration }}</td> 
                        <td class="p-6">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-indigo-50 text-indigo-700 font-bold rounded-full flex items-center justify-center text-xs shadow-inner uppercase">
                                    {{ substr($k->user->name ?? 'K', 0, 2) }}
                                </div>
                                <span class="font-bold text-slate-800">{{ $k->user->name }}</span>
                            </div>
                        </td> 
                        <td class="p-6">
                            <span class="px-2.5 py-1 bg-indigo-50 text-indigo-700 rounded-lg text-xs font-bold uppercase tracking-wider">
                                {{ $k->jabatan->nama_jabatan }}
                            </span>
                        </td> 
                        <td class="p-6 text-slate-600 text-sm font-medium">{{ $k->alamat }}</td> 
                        <td class="p-6 text-slate-600 text-sm font-medium">{{ $k->no_hp }}</td> 
                        @if(auth()->user()->role_id == 1)
                        <td class="p-6 text-right"> 
                            <div class="flex items-center justify-end gap-3">
                                <a href="/karyawan/{{ $k->id }}/edit" class="px-3 py-1.5 bg-indigo-50 hover:bg-indigo-100 text-indigo-600 rounded-lg font-bold text-xs transition">Edit</a> 
                                <form action="/karyawan/{{ $k->id }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data karyawan ini?')"> 
                                    @csrf @method('DELETE') 
                                    <button class="px-3 py-1.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-lg font-bold text-xs transition">Hapus</button> 
                                </form> 
                            </div>
                        </td> 
                        @endif
                    </tr> 
                    @endforeach 
                </tbody> 
            </table> 
        </div>
    </div>
</div>
@endsection
