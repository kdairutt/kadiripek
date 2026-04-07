<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Proje Düzenle - Admin</title>
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
            <h1 class="text-3xl font-bold">Projeyi Düzenle</h1>
            <a href="/admin/projects" class="text-gray-400 hover:text-white transition">← Geri</a>
        </div>

        <form method="POST" action="/admin/projects/{{ $project->id }}" class="space-y-6" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm text-gray-400 mb-2">Proje Adı *</label>
                <input type="text" name="title" value="{{ $project->title }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Kategori *</label>
                <select name="category" class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
                    <option value="kod" {{ $project->category == 'kod' ? 'selected' : '' }}>Kod</option>
                    <option value="yönetim" {{ $project->category == 'yönetim' ? 'selected' : '' }}>Yönetim</option>
                    <option value="araştırma" {{ $project->category == 'araştırma' ? 'selected' : '' }}>Araştırma</option>
                    <option value="tasarım" {{ $project->category == 'tasarım' ? 'selected' : '' }}>Tasarım</option>
                    <option value="diğer" {{ $project->category == 'diğer' ? 'selected' : '' }}>Diğer</option>
                </select>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Açıklama *</label>
                <textarea name="description" rows="4"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">{{ $project->description }}</textarea>
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Link Etiketi</label>
                <input type="text" name="link_label" placeholder="Ör: GitHub, Dokümana Git, Demo..."
                    value="{{ old('link_label', isset($project) ? $project->link_label : '') }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Link URL</label>
                <input type="text" name="link_url"
                    value="{{ old('link_url', isset($project) ? $project->link_url : '') }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Proje Görseli</label>
                @if($project->image)
                    <img src="{{ asset('storage/' . $project->image) }}" class="w-32 h-32 object-cover rounded-lg mb-3">
                @endif
                <label class="flex items-center gap-3 bg-gray-900 border border-gray-700 border-dashed rounded-lg px-4 py-6 cursor-pointer hover:border-gray-500 transition">
                    <span class="text-gray-400 text-sm" id="file-label">Görsel seç veya sürükle bırak</span>
                    <input type="file" name="image" accept="image/*" class="hidden"
                        onchange="document.getElementById('file-label').textContent = this.files[0].name">
                </label>
                @if($project->image)
                    <p class="text-gray-500 text-xs mt-1">Boş bırakırsan mevcut görsel korunur.</p>
                @endif
            </div>

            <div>
                <label class="block text-sm text-gray-400 mb-2">Sıra</label>
                <input type="number" name="order" min="1" value="{{ $project->order }}"
                    class="w-full bg-gray-900 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-gray-500">
            </div>

            <button type="submit" class="w-full bg-white text-gray-900 font-semibold py-3 rounded-lg hover:bg-gray-200 transition">
                Güncelle
            </button>
        </form>
    </div>
</body>
</html>