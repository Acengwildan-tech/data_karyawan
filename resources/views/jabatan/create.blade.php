@extends('layouts.app') 

@section('content') 
<div class="space-y-6 max-w-xl">
    <!-- Header with Back Button -->
    <div class="flex items-center gap-4">
        <a href="/jabatan" class="w-10 h-10 bg-white border border-slate-150 rounded-xl flex items-center justify-center text-slate-600 hover:text-indigo-600 shadow-sm transition hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Jabatan</h1> 
            <p class="text-xs text-slate-500 mt-0.5">Definisikan peran baru dalam hierarki instansi Anda.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 lg:p-8">
        <form action="/jabatan" method="POST" class="space-y-6"> 
            @csrf 
            
            <div>
                <label for="nama_jabatan" class="block text-sm font-semibold text-slate-600 mb-2">Nama Jabatan</label>
                <input type="text" name="nama_jabatan" id="nama_jabatan" placeholder="Contoh: Manager Pemasaran" required class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-indigo-500/10 hover:scale-[1.02] active:scale-[0.98] transition">
                    Simpan Jabatan
                </button> 
            </div>
        </form> 
    </div>
</div>
@endsection
