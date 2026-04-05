<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Deneyim Ekle - Admin</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white min-h-screen">

    <nav class="border-b border-gray-800 px-8 py-4 flex justify-between items-center">
        <a href="/admin/dashboard" class="text-xl font-bold">Admin Panel</a>
        <form method="POST" action="/admin/logout">
            @csrf
            <button type="submit" class="text-gray-400 hover:text-white transition">Çıkış Yap</button>
        </form>
    </nav>

    <div class="max-w-2xl mx-auto py-12 px-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Yeni Deneyim</h1>
            <a href="/admin/experiences" class="text-gray-400 hover:text-white transition">← Geri</a>
        </div>

        @if($errors->any())
            <div class="bg-red-900 border border-red-700 rounded-lg p-4 mb-6">
                @foreach($errors->all() as $error)
                    <p class="text-red-300 text-sm">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="/admin/experiences" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm text-gray-400 mb-2">Şirket / Kurum *</label>
                <input type="text" name="company" value="{{ old('company') }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Pozisyon / Rol *</label>
                <input type="text" name="role" value="{{ old('role') }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Açıklama</label>
                <textarea name="description" rows="4"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Başlangıç *</label>
                    <input type="text" name="start_date" placeholder="Ör: Mart 2023" value="{{ old('start_date') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Bitiş</label>
                    <input type="text" name="end_date" placeholder="Ör: Haziran 2023" value="{{ old('end_date') }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_current" id="is_current" class="w-4 h-4">
                <label for="is_current" class="text-gray-400 text-sm">Halen devam ediyor</label>
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