<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Sertifika Düzenle - Admin</title>
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
            <h1 class="text-3xl font-bold">Sertifikayı Düzenle</h1>
            <a href="/admin/certificates" class="text-gray-400 hover:text-white transition">← Geri</a>
        </div>

        <form method="POST" action="/admin/certificates/{{ $certificate->id }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sertifika Adı *</label>
                <input type="text" name="title" value="{{ $certificate->title }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Veren Kurum *</label>
                <input type="text" name="issuer" value="{{ $certificate->issuer }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Tarih *</label>
                <input type="text" name="date" value="{{ $certificate->date }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sertifika URL</label>
                <input type="text" name="credential_url" value="{{ $certificate->credential_url }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sertifika Görseli</label>
                @if(isset($certificate) && $certificate->image)
                    <img src="{{ asset('storage/' . $certificate->image) }}" class="w-32 h-32 object-cover rounded-lg mb-3">
                @endif
                <label class="flex items-center gap-3 bg-gray-900 border border-gray-700 border-dashed rounded-lg px-4 py-6 cursor-pointer hover:border-gray-500 transition">
                    <span class="text-gray-400 text-sm" id="file-label">Görsel seç veya sürükle bırak</span>
                    <input type="file" name="image" accept="image/*" class="hidden" onchange="document.getElementById('file-label').textContent = this.files[0].name">
                </label>
                @if(isset($certificate) && $certificate->image)
                    <p class="text-gray-500 text-xs mt-1">Boş bırakırsan mevcut görsel korunur.</p>
                @endif
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sıra</label>
                <input type="number" name="order" min="1" value="{{ $certificate->order }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <button type="submit" class="w-full bg-white text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-200 transition">
                Güncelle
            </button>
        </form>
    </div>
</body>
</html>