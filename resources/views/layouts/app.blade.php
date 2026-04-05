<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portfolyo' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white min-h-screen">

    {{-- Navbar --}}
    <nav class="border-b border-gray-800 px-8 py-4 flex justify-between items-center">
        <a href="/" class="text-xl font-bold text-white">kadir.dev</a>
        <div class="flex gap-6 text-gray-400">
            @if(!Route::is('home'))
            <a href="/" class="hover:text-white transition">Ana Sayfa</a>
            @endif
            <a href="/deneyimler" class="hover:text-white transition">Deneyim</a>
            <a href="/projeler" class="hover:text-white transition">Projeler</a>
            <a href="/sertifikalar" class="hover:text-white transition">Sertifikalar</a>
            <a href="/hakkimda" class="hover:text-white transition">Hakkımda</a>
        </div>
    </nav>

    {{-- Sayfa içeriği buraya gelecek --}}
    <main class="px-8 py-12">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-800 px-8 py-6 text-center text-gray-500 text-sm">
        © 2026 Abdülkadir İpek. Tüm hakları saklıdır.
    </footer>

</body>
</html>