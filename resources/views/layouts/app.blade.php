<!DOCTYPE html> 
<html lang="id"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem DataKaryawan</title> 
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script> 
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .active-nav { background: #e0e7ff; color: #4338ca; }
        .glass-sidebar { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
    </style>
</head> 
<body class="bg-gradient-to-tr from-indigo-50/70 via-slate-50 to-purple-50/60 text-slate-800 antialiased min-h-screen flex flex-col"> 
    
    <!-- Top Navbar --> 
    <header class="bg-white border-b border-slate-100 sticky top-0 z-40 px-6 py-4 flex justify-between items-center shadow-sm"> 
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center text-white font-bold text-lg shadow-md">D</div>
            <span class="text-lg font-bold tracking-tight text-indigo-900">DataKaryawan</span>
        </div>
        
        <div class="flex items-center gap-5">
            <!-- User Profile and Badge -->
            <div class="flex items-center gap-3 border-r border-slate-200 pr-5">
                <div class="w-9 h-9 bg-indigo-100 text-indigo-700 font-bold rounded-full flex items-center justify-center text-sm shadow-inner uppercase">
                    {{ substr(auth()->user()->name ?? 'U', 0, 2) }}
                </div>
                <div class="text-left hidden md:block">
                    <p class="text-sm font-semibold text-slate-800 leading-none">{{ auth()->user()->name }}</p>
                    <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full uppercase mt-1 inline-block">
                        {{ auth()->user()->role_id == 1 ? 'Admin' : 'Karyawan' }}
                    </span>
                </div>
            </div>

            <!-- Logout -->
            <form action="/logout" method="POST" class="inline"> 
                @csrf 
                <button class="px-4 py-2 bg-rose-50 hover:bg-rose-100 text-rose-600 hover:text-rose-700 font-semibold text-sm rounded-xl transition flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span>Keluar</span>
                </button> 
            </form> 
        </div> 
    </header> 

    <!-- Sidebar & Content -->
    <div class="flex-1 flex flex-col md:flex-row"> 
        <!-- Sidebar -->
        <aside class="w-full md:w-64 bg-white border-r border-slate-100 p-6 flex flex-col justify-between"> 
            <div class="space-y-6">
                <p class="text-xs font-bold text-slate-400 uppercase tracking-wider">Navigasi Utama</p>
                <ul class="space-y-2"> 
                    <li>
                        <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition {{ Request::is('dashboard') ? 'active-nav' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li> 
                    @if(auth()->user()->role_id == 1)
                    <li>
                        <a href="/jabatan" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition {{ Request::is('jabatan*') ? 'active-nav' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2-2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Jabatan</span>
                        </a>
                    </li> 
                    @endif
                    <li>
                        <a href="/karyawan" class="flex items-center gap-3 px-4 py-3 rounded-xl font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 transition {{ Request::is('karyawan*') ? 'active-nav' : '' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span>Karyawan</span>
                        </a>
                    </li> 
                </ul> 
            </div>

            <!-- Profile Shortcut info Card -->
            <div class="mt-auto pt-6 border-t border-slate-100 hidden md:block">
                <div class="bg-indigo-50/50 rounded-2xl p-4 border border-indigo-100/50 flex flex-col gap-2">
                    <p class="text-xs font-bold text-indigo-800">Butuh Bantuan?</p>
                    <p class="text-[11px] text-indigo-900/60 leading-relaxed">Hubungi IT Support jika Anda mengalami kendala operasional sistem.</p>
                </div>
            </div>
        </aside> 

        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10"> 
            <div class="max-w-7xl mx-auto space-y-6">
                @yield('content') 
                {{ $slot ?? '' }}
            </div>
        </main> 
    </div> 
</body> 
</html>