<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Projeler - Admin</title>
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

    <div class="max-w-4xl mx-auto py-12 px-8">
        @if(session('success'))
            <p class="text-green-400 mb-6">{{ session('success') }}</p>
        @endif

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Projeler</h1>
            <a href="/admin/projects/create" class="bg-white text-gray-900 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                + Yeni Ekle
            </a>
        </div>

        @if($projects->isEmpty())
            <p class="text-gray-400">Henüz proje eklenmemiş.</p>
        @else
            <div class="space-y-4">
                @foreach($projects as $project)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex justify-between items-start gap-4">
                        <div class="flex gap-4 items-start">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                            @else
                                <div class="w-16 h-16 bg-gray-800 rounded-lg flex-shrink-0"></div>
                            @endif
                            <div>
                                <span class="text-xs text-gray-500 uppercase tracking-widest">{{ $project->category }}</span>
                                <h2 class="font-semibold text-lg mt-1">{{ $project->title }}</h2>
                                <p class="text-gray-400 text-sm mt-1">{{ Str::limit($project->description, 80) }}</p>
                            </div>
                        </div>
                        <div class="flex gap-4 flex-shrink-0">
                            <a href="/admin/projects/{{ $project->id }}/edit" class="text-gray-400 hover:text-white transition text-sm">Düzenle</a>
                            <form method="POST" action="/admin/projects/{{ $project->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 transition text-sm"
                                    onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>