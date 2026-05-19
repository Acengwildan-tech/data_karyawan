<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Portal - Data Karyawan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .glass { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2); }
        .hero-gradient { background: radial-gradient(circle at top right, #e0e7ff, #ffffff); }
    </style>
</head>
<body class="hero-gradient min-h-screen text-slate-800 antialiased overflow-x-hidden">
    
    <!-- Navbar -->
    <nav class="fixed top-0 w-full z-50 glass py-4 px-8 flex justify-between items-center shadow-sm">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">D</div>
            <span class="text-xl font-bold tracking-tight text-indigo-900">DataKaryawan</span>
        </div>
        <div class="flex gap-4 items-center">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-full font-semibold hover:bg-indigo-700 transition shadow-md">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-slate-600 font-medium hover:text-indigo-600 transition">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-6 py-2 bg-indigo-600 text-white rounded-full font-semibold hover:bg-indigo-700 transition shadow-md">Daftar</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-8 max-w-7xl mx-auto grid lg:grid-cols-2 items-center gap-12">
        <div class="space-y-8">
            <div class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold tracking-wide uppercase">Era Baru Manajemen</div>
            <h1 class="text-6xl font-bold text-slate-900 leading-tight">
                Kelola <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">Karyawan Anda</span> dengan Presisi.
            </h1>
            <p class="text-lg text-slate-600 leading-relaxed max-w-xl">
                Solusi modern yang andal, intuitif, dan efisien untuk manajemen data karyawan. Akses data jabatan, karyawan, dan ringkasan informasi dalam satu klik.
            </p>
            <div class="flex gap-4">
                <a href="{{ auth()->check() ? url('/dashboard') : route('login') }}" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg hover:scale-105 transition transform shadow-xl">Mulai Sekarang</a>
                <a href="#features" class="px-8 py-4 bg-white text-slate-800 border border-slate-200 rounded-2xl font-bold text-lg hover:bg-slate-50 transition shadow-md">Jelajahi Fitur</a>
            </div>
        </div>
        <div class="relative">
            <div class="absolute -top-20 -right-20 w-80 h-80 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <div class="absolute -bottom-20 -left-20 w-80 h-80 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <img src="{{ asset('images/landing_hero.png') }}" alt="Hero Image" class="relative rounded-3xl shadow-2xl border-4 border-white transform rotate-2 hover:rotate-0 transition duration-500">
        </div>
    </section>

    <!-- Feature Access Section -->
    <section id="features" class="py-20 px-8 bg-slate-50/50">
        <div class="max-w-7xl mx-auto space-y-12">
            <div class="text-center space-y-4">
                <h2 class="text-4xl font-bold text-slate-900">Modul Akses Langsung</h2>
                <p class="text-slate-500 max-w-2xl mx-auto">Navigasi cepat melalui komponen utama aplikasi. Semua yang Anda butuhkan ada di sini.</p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Dashboard Card -->
                <a href="{{ auth()->check() ? url('/dashboard') : route('login') }}" class="group p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Dashboard Utama</h3>
                    <p class="text-slate-500">Lihat statistik real-time dan ringkasan seluruh organisasi Anda secara sekilas.</p>
                    <span class="text-indigo-600 font-bold group-hover:translate-x-2 transition inline-flex items-center">Buka Dashboard →</span>
                </a>

                <!-- Jabatan Card -->
                <a href="{{ auth()->check() ? url('/jabatan') : route('login') }}" class="group p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 bg-purple-100 text-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Data Jabatan</h3>
                    <p class="text-slate-500">Kelola nama jabatan, struktur, dan hierarki organisasi dengan mudah.</p>
                    <span class="text-indigo-600 font-bold group-hover:translate-x-2 transition inline-flex items-center">Kelola Jabatan →</span>
                </a>

                <!-- Karyawan Card -->
                <a href="{{ auth()->check() ? url('/karyawan') : route('login') }}" class="group p-8 bg-white rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border border-slate-100 flex flex-col items-center text-center space-y-4">
                    <div class="w-16 h-16 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold">Data Karyawan</h3>
                    <p class="text-slate-500">Kontrol penuh atas catatan karyawan, profil, dan pengelolaan data riwayat.</p>
                    <span class="text-indigo-600 font-bold group-hover:translate-x-2 transition inline-flex items-center">Kelola Karyawan →</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 border-t border-slate-200 text-center">
        <p class="text-slate-400">@2026</p>
    </footer>

</body>
</html>
