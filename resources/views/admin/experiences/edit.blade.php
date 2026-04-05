<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Deneyim Düzenle - Admin</title>
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
            <h1 class="text-3xl font-bold">Deneyimi Düzenle</h1>
            <a href="/admin/experiences" class="text-gray-400 hover:text-white transition">← Geri</a>
        </div>

        <form method="POST" action="/admin/experiences/{{ $experience->id }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm text-gray-400 mb-2">Şirket / Kurum *</label>
                <input type="text" name="company" value="{{ $experience->company }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Pozisyon / Rol *</label>
                <input type="text" name="role" value="{{ $experience->role }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Açıklama</label>
                <textarea name="description" rows="4"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">{{ $experience->description }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Başlangıç *</label>
                    <input type="text" name="start_date" value="{{ $experience->start_date }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-2">Bitiş</label>
                    <input type="text" name="end_date" value="{{ $experience->end_date }}"
                        class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="checkbox" name="is_current" id="is_current" class="w-4 h-4"
                    {{ $experience->is_current ? 'checked' : '' }}>
                <label for="is_current" class="text-gray-400 text-sm">Halen devam ediyor</label>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sıra</label>
                <input type="number" name="order" min="1" value="{{ $experience->order }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <button type="submit" class="w-full bg-white text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-200 transition">
                Güncelle
            </button>
        </form>
    </div>

</body>
</html>