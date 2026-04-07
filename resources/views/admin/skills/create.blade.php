<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Beceri Ekle - Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white min-h-screen">
    <nav class="border-b border-gray-800 px-8 py-4 flex justify-between items-center">
        <a href="/admin/dashboard" class="text-xl font-bold">Admin Panel</a>
        <form method="POST" action="/admin/logout" class="flex items-center">
            @csrf
            <button type="submit" class="text-sm text-gray-400 hover:text-white transition bg-transparent border-0 p-0 cursor-pointer">Çıkış Yap</button>
        </form>
    </nav>

    <div class="max-w-2xl mx-auto py-12 px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Yeni Beceri</h1>
            <a href="/admin/skills" class="text-gray-400 hover:text-white transition">← Geri</a>
        </div>

        @if($errors->any())
            <div class="bg-red-900 border border-red-700 rounded-lg p-4 mb-6">
                @foreach($errors->all() as $error)
                    <p class="text-red-300 text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/admin/skills" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm text-gray-400 mb-2">Beceri Adı *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Kategori *</label>
                <input type="text" name="category" value="{{ old('category') }}"
                    placeholder="Ör: Programlama, Araç, Framework, Dil..."
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sıra</label>
                <input type="number" name="order" min="1" value="{{ old('order', 1) }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <button type="submit" class="w-full bg-white text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-200 transition">
                Kaydet
            </button>
        </form>
    </div>
</body>
</html>