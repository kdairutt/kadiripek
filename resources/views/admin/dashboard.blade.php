<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-950 text-white min-h-screen">

    <nav class="border-b border-gray-800 px-8 py-4 flex justify-between items-center">
        <span class="text-xl font-bold">Admin Panel</span>
        <form method="POST" action="/admin/logout">
            @csrf
            <button type="submit" class="text-gray-400 hover:text-white transition">Çıkış Yap</button>
        </form>
    </nav>

    <div class="max-w-4xl mx-auto py-12 px-8">
        <h1 class="text-3xl font-bold mb-8">Hoş geldin!</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="/admin/projects" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h2 class="text-lg font-semibold mb-2">🗂 Projeler</h2>
                <p class="text-gray-400 text-sm">Projeleri ekle, düzenle, sil</p>
            </a>
            <a href="/admin/experiences" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h2 class="text-lg font-semibold mb-2">💼 Deneyimler</h2>
                <p class="text-gray-400 text-sm">İş deneyimlerini ekle, düzenle, sil</p>
            </a>
            <a href="/admin/educations" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h2 class="text-lg font-semibold mb-2">🎓 Eğitimler</h2>
                <p class="text-gray-400 text-sm">Eğitim bilgilerini ekle, düzenle, sil</p>
            </a>
            <a href="/admin/certificates" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h2 class="text-lg font-semibold mb-2">📜 Sertifikalar</h2>
                <p class="text-gray-400 text-sm">Sertifikaları ekle, düzenle, sil</p>
            </a>
        </div>
    </div>

</body>
</html>