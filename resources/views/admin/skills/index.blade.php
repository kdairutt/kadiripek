<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Beceriler - Admin</title>
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

    <div class="max-w-4xl mx-auto py-12 px-8">
        @if(session('success'))
            <p class="text-green-400 mb-6">{{ session('success') }}</p>
        @endif

        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Beceriler</h1>
            <a href="/admin/skills/create" class="bg-white text-gray-900 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                + Yeni Ekle
            </a>
        </div>

        @if($skills->isEmpty())
            <p class="text-gray-400">Henüz beceri eklenmemiş.</p>
        @else
            @foreach($skills->groupBy('category') as $category => $group)
                <div class="mb-8">
                    <h2 class="text-gray-500 uppercase tracking-widest text-xs mb-4">{{ $category }}</h2>
                    <div class="space-y-3">
                        @foreach($group as $skill)
                            <div class="bg-gray-900 border border-gray-800 rounded-xl px-6 py-4 flex justify-between items-center">
                                <span class="font-medium">{{ $skill->name }}</span>
                                <div class="flex items-center gap-4">
                                    <a href="/admin/skills/{{ $skill->id }}/edit" class="text-sm text-gray-400 hover:text-white transition">Düzenle</a>
                                    <form method="POST" action="/admin/skills/{{ $skill->id }}" class="flex items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-400 hover:text-red-300 transition bg-transparent border-0 p-0 cursor-pointer"
                                            onclick="return confirm('Silmek istediğine emin misin?')">Sil</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</body>
</html>