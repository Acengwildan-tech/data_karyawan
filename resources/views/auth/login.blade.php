<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" autocomplete="off">
        @csrf

        <!-- Fake inputs to prevent autofill -->
        <input type="text" style="display:none" autocomplete="off" />
        <input type="password" style="display:none" autocomplete="off" />

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Masuk</h2>
            <p class="text-slate-400 mt-2 text-sm">Masukkan akun Anda untuk melanjutkan ke dashboard.</p>
        </div>

        <!-- Form Inputs -->
        <div class="space-y-6">
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Email</label>
                <input id="email" type="email" name="email" value="" required autofocus autocomplete="new-password" class="block w-full px-5 py-3.5 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">Kata Sandi</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full px-5 py-3.5 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center cursor-pointer">
                <input id="remember_me" type="checkbox" class="rounded border-slate-700 bg-slate-900/50 text-indigo-500 focus:ring-indigo-500/50" name="remember">
                <span class="ms-2 text-sm text-slate-300">Ingat saya</span>
            </label>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-orange-500 to-rose-500 hover:from-orange-600 hover:to-rose-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-orange-500/20 hover:scale-[1.02] active:scale-[0.98] transition duration-200">
                Masuk
            </button>
        </div>

        <!-- Footnote / Switch -->
        <div class="mt-8 text-center border-t border-slate-700/50 pt-6">
            <p class="text-sm text-slate-400">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="text-indigo-400 hover:text-indigo-300 font-bold underline decoration-indigo-400/50 hover:decoration-indigo-300 transition">
                    Daftar Sekarang
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
