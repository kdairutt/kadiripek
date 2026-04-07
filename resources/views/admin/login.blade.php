<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Yönetici Girişi</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white min-h-screen flex items-center justify-center">
    <div class="bg-gray-900 p-8 rounded-xl border border-gray-800 w-full max-w-sm">
        <h1 class="text-2xl font-bold mb-6 text-center">Admin Girişi</h1>
        @if(session('error'))
            <p class="text-red-400 text-sm mb-4 text-center">{{ session('error') }}</p>
        @endif
        <a href="/" class="block text-center text-gray-500 hover:text-gray-300 text-sm my-6 transition">← Siteye Dön</a>
        <form method="POST" action="/admin/login">
            @csrf
            <input
                type="password"
                name="password"
                placeholder="Şifre"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white mb-4 focus:outline-none focus:border-gray-500"
            >
            <button type="submit" class="w-full bg-white text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-200 transition">
                Giriş Yap
            </button>
        </form>
    </div>
</body>
</html>