<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Deneyimler - Admin</title>
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
            <h1 class="text-3xl font-bold">Deneyimler</h1>
            <a href="/admin/experiences/create" class="bg-white text-gray-900 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                + Yeni Ekle
            </a>
        </div>

        @if($experiences->isEmpty())
            <p class="text-gray-400">Henüz deneyim eklenmemiş.</p>
        @else
            <div class="space-y-4">
                @foreach($experiences as $experience)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex justify-between items-start">
                        <div>
                            <h2 class="font-semibold text-lg">{{ $experience->role }}</h2>
                            <p class="text-gray-400">{{ $experience->company }}</p>
                            <p class="text-gray-500 text-sm mt-1">
                                {{ $experience->start_date }} —
                                {{ $experience->is_current ? 'Devam ediyor' : $experience->end_date }}
                            </p>
                        </div>
                        <div class="flex items-center gap-4 flex-shrink-0">
                            <a href="/admin/experiences/{{ $experience->id }}/edit" class="text-gray-400 hover:text-white transition text-sm">Düzenle</a>
                            <form method="POST" action="/admin/experiences/{{ $experience->id }}" class="flex items-center">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-400 hover:text-red-300 transition text-sm bg-transparent border-0 p-0 cursor-pointer"
                                    onclick="return confirm('Silmek istediğine emin misin?')">
                                    Sil
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>