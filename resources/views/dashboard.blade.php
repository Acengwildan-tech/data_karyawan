@extends('layouts.app') 

@section('content') 
<div class="space-y-8">
    <!-- Welcome Header Banner -->
    <div class="bg-gradient-to-r from-indigo-900 to-indigo-800 rounded-3xl p-6 lg:p-8 text-white shadow-xl relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-6">
        <!-- Decorative subtle circles -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-indigo-500/20 rounded-full filter blur-xl"></div>
        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-indigo-500/20 rounded-full filter blur-xl"></div>

        <div class="space-y-2 relative z-10">
            <h1 class="text-3xl font-extrabold tracking-tight">Selamat Datang Kembali, {{ auth()->user()->name }}!</h1>
            <p class="text-indigo-200 text-sm md:text-base font-light">Sistem manajemen kepegawaian Anda siap. Berikut adalah statistik ringkasan seluruh organisasi Anda hari ini.</p>
        </div>

        <div class="flex items-center gap-2 bg-indigo-950/40 border border-indigo-700/30 rounded-2xl px-4 py-2.5 w-max relative z-10 self-start md:self-auto">
            <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-ping"></span>
            <span class="text-xs font-semibold uppercase tracking-wider text-indigo-100">Sistem Aktif</span>
        </div>
    </div>

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6"> 
        <!-- Total Karyawan Card -->
        <div class="bg-gradient-to-br from-indigo-700 to-indigo-900 rounded-3xl p-6 border border-indigo-600/30 shadow-md hover:shadow-lg transition duration-300 flex items-center justify-between relative overflow-hidden"> 
            <!-- Decorative circle -->
            <div class="absolute -right-5 -bottom-5 w-24 h-24 bg-indigo-500/10 rounded-full"></div>
            <div class="space-y-2 relative z-10">
                <span class="text-sm font-semibold text-indigo-200 uppercase tracking-wider">Total Karyawan</span> 
                <p class="text-5xl font-extrabold text-white">{{ $totalKaryawan }}</p> 
                <a href="/karyawan" class="text-xs text-indigo-100 hover:text-white font-bold flex items-center gap-1 mt-1 group">
                    <span>Lihat Seluruh Karyawan</span>
                    <span class="group-hover:translate-x-1 transition duration-200">→</span>
                </a>
            </div> 
            <div class="w-16 h-16 bg-white/10 text-white rounded-2xl flex items-center justify-center shadow-inner relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
        </div> 

        <!-- Total Jabatan Card -->
        <div class="bg-gradient-to-br from-purple-700 to-purple-900 rounded-3xl p-6 border border-purple-600/30 shadow-md hover:shadow-lg transition duration-300 flex items-center justify-between relative overflow-hidden"> 
            <!-- Decorative circle -->
            <div class="absolute -right-5 -bottom-5 w-24 h-24 bg-purple-500/10 rounded-full"></div>
            <div class="space-y-2 relative z-10">
                <span class="text-sm font-semibold text-purple-200 uppercase tracking-wider">Total Jabatan</span> 
                <p class="text-5xl font-extrabold text-white">{{ $totalJabatan }}</p> 
                <a href="/jabatan" class="text-xs text-purple-100 hover:text-white font-bold flex items-center gap-1 mt-1 group">
                    <span>Kelola Struktur Jabatan</span>
                    <span class="group-hover:translate-x-1 transition duration-200">→</span>
                </a>
            </div> 
            <div class="w-16 h-16 bg-white/10 text-white rounded-2xl flex items-center justify-center shadow-inner relative z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z" />
                </svg>
            </div>
        </div> 
    </div> 
</div>
@endsection
