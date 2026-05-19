<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" autocomplete="off">
        @csrf

        <!-- Fake inputs to prevent autofill -->
        <input type="text" style="display:none" autocomplete="off" />
        <input type="password" style="display:none" autocomplete="off" />

        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-extrabold text-white tracking-tight">Daftar</h2>
            <p class="text-slate-400 mt-2 text-sm">Buat akun baru untuk mulai menggunakan platform ini.</p>
        </div>

        <div class="space-y-5">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-300 mb-2">Nama Lengkap</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="off" class="block w-full px-5 py-3 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-400" />
            </div>

            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-300 mb-2">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="off" class="block w-full px-5 py-3 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-300 mb-2">Kata Sandi</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="block w-full px-5 py-3 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-semibold text-slate-300 mb-2">Konfirmasi Kata Sandi</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="block w-full px-5 py-3 bg-slate-900/50 border border-slate-700/60 rounded-2xl text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-400" />
            </div>
        </div>

        <!-- Submit Button -->
        <div class="mt-8">
            <button type="submit" class="w-full py-4 bg-gradient-to-r from-orange-500 to-rose-500 hover:from-orange-600 hover:to-rose-600 text-white font-bold rounded-2xl shadow-lg hover:shadow-orange-500/20 hover:scale-[1.02] active:scale-[0.98] transition duration-200">
                Daftar
            </button>
        </div>

        <!-- Footnote / Switch -->
        <div class="mt-8 text-center border-t border-slate-700/50 pt-6">
            <p class="text-sm text-slate-400">
                Sudah terdaftar? 
                <a href="{{ route('login') }}" class="text-indigo-400 hover:text-indigo-300 font-bold underline decoration-indigo-400/50 hover:decoration-indigo-300 transition">
                    Masuk Sekarang
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
