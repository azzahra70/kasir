<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-gray-800 to-black font-sans">

  <!-- Container -->
  <div class="w-full max-w-md bg-white/10 backdrop-blur-2xl rounded-3xl shadow-2xl border border-white/20 p-10">
    
    <!-- Logo / Icon -->
    <div class="text-center mb-8">
      <div class="w-20 h-20 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto shadow-lg">
        <span class="text-white text-3xl">⚡</span>
      </div>
      <h2 class="text-3xl font-bold text-white mt-5">Selamat Datang</h2>
      <p class="text-gray-400 text-sm mt-2">Masuk untuk melanjutkan ke Dashboard</p>
    </div>

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm font-semibold text-gray-200">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}"
               required autofocus autocomplete="username"
               class="mt-2 w-full px-4 py-3 rounded-xl bg-white/10 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition shadow-sm" placeholder="you@example.com"/>
        @error('email')
          <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-semibold text-gray-200">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password"
               class="mt-2 w-full px-4 py-3 rounded-xl bg-white/10 border border-gray-600 text-white placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition shadow-sm" placeholder="********"/>
        @error('password')
          <p class="text-red-400 text-xs mt-1">{{ $message }}</p>
        @enderror
      </div>

      <!-- Remember + Forgot -->
      <div class="flex items-center justify-between text-sm">
        <label class="flex items-center text-gray-300">
          <input type="checkbox" name="remember" class="rounded bg-gray-700 border-gray-500 text-indigo-400 focus:ring-indigo-500">
          <span class="ml-2">Ingat saya</span>
        </label>
        @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-indigo-400 hover:text-indigo-300 transition">
            Lupa password?
          </a>
        @endif
      </div>

      <!-- Button -->
      <button type="submit"
              class="w-full bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-500 hover:to-purple-500 text-white font-semibold py-3 px-4 rounded-xl shadow-lg transition transform hover:scale-105 active:scale-95">
        Masuk 🚀
      </button>
    </form>

    <!-- Register -->
    <p class="text-center text-gray-400 text-sm mt-8">
      Belum punya akun?
      <a href="{{ route('register') }}" class="text-indigo-400 font-semibold hover:text-indigo-300 transition">
        Daftar sekarang
      </a>
    </p>
  </div>

</body>
</html>
