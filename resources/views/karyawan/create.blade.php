@extends('layouts.app') 

@section('content') 
<div class="space-y-6 max-w-xl">
    <!-- Header with Back Button -->
    <div class="flex items-center gap-4">
        <a href="/karyawan" class="w-10 h-10 bg-white border border-slate-150 rounded-xl flex items-center justify-center text-slate-600 hover:text-indigo-600 shadow-sm transition hover:scale-105">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </a>
        <div>
            <h1 class="text-2xl font-extrabold text-slate-800 tracking-tight">Tambah Karyawan</h1> 
            <p class="text-xs text-slate-500 mt-0.5">Daftarkan data detail profil karyawan baru di sistem.</p>
        </div>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm p-6 lg:p-8">
        <form action="/karyawan" method="POST" class="space-y-5"> 
            @csrf 
            
            <!-- User Account -->
            <div>
                <label for="user_id" class="block text-sm font-semibold text-slate-600 mb-2">Akun Pengguna</label>
                <select name="user_id" id="user_id" required class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"> 
                    @foreach ($users as $u) 
                    <option value="{{ $u->id }}">{{ $u->name }} ({{ $u->email }})</option> 
                    @endforeach 
                </select> 
            </div>

            <!-- Jabatan -->
            <div>
                <label for="jabatan_id" class="block text-sm font-semibold text-slate-600 mb-2">Jabatan / Peran</label>
                <select name="jabatan_id" id="jabatan_id" required class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition"> 
                    @foreach ($jabatans as $j) 
                    <option value="{{ $j->id }}">{{ $j->nama_jabatan }}</option> 
                    @endforeach 
                </select> 
            </div>

            <!-- Alamat -->
            <div>
                <label for="alamat" class="block text-sm font-semibold text-slate-600 mb-2">Alamat Tempat Tinggal</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap" required class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
            </div>

            <!-- No HP -->
            <div>
                <label for="no_hp" class="block text-sm font-semibold text-slate-600 mb-2">Nomor Telepon / HP</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Contoh: 0812XXXXXXXX" required class="block w-full px-5 py-3.5 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-indigo-500/10 hover:scale-[1.02] active:scale-[0.98] transition">
                    Simpan Karyawan
                </button> 
            </div>
        </form> 
    </div>
</div>
@endsection
