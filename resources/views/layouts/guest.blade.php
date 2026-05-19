<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Portal Masuk - DataKaryawan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
        <style>
            body { font-family: 'Outfit', sans-serif; }
            .glass { background: rgba(255, 255, 255, 0.08); backdrop-filter: blur(16px); border: 1px solid rgba(255, 255, 255, 0.15); }
            .hero-gradient { background: radial-gradient(circle at top right, #312e81, #0f172a); }
        </style>

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="hero-gradient min-h-screen text-slate-100 antialiased overflow-x-hidden">
        <div class="min-h-screen flex lg:flex-row flex-col">
            <!-- Left Side: Brand Panel -->
            <div class="lg:w-7/12 w-full p-8 lg:p-20 flex flex-col justify-between relative overflow-hidden min-h-[300px] lg:min-h-screen">
                <!-- Abstract glowing backgrounds -->
                <div class="absolute -top-20 -left-20 w-96 h-96 bg-indigo-500/20 rounded-full filter blur-3xl opacity-50 animate-pulse"></div>
                <div class="absolute bottom-20 right-10 w-80 h-80 bg-purple-500/20 rounded-full filter blur-3xl opacity-50 animate-pulse"></div>
                
                <!-- Logo -->
                <div class="flex items-center gap-3 relative z-10">
                    <a href="/" class="flex items-center gap-2">
                        <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg">D</div>
                        <span class="text-xl font-bold tracking-tight text-white">DataKaryawan</span>
                    </a>
                </div>

                <!-- Central Content -->
                <div class="my-auto max-w-xl space-y-6 relative z-10 py-10 lg:py-0">
                    <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight tracking-tight text-white">
                        Selamat <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-purple-400">Datang!</span>
                    </h1>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-full"></div>
                    <p class="text-lg text-slate-300 leading-relaxed font-light">
                        Kelola data kepegawaian, jabatan, dan laporan statistik instansi Anda secara presisi, intuitif, dan aman dalam satu genggaman platform modern.
                    </p>

                </div>

                <!-- Footer copyright -->
                <div class="text-sm text-slate-400 relative z-10 mt-auto">
                    &copy; 2026 Sistem DataKaryawan. Hak Cipta Dilindungi.
                </div>
            </div>

            <!-- Right Side: Forms Panel -->
            <div class="lg:w-5/12 w-full flex items-center justify-center p-6 lg:p-12 relative z-10">
                <div class="w-full max-w-md glass rounded-3xl p-8 lg:p-10 shadow-2xl relative overflow-hidden">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
