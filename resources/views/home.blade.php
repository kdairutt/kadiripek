@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')

    {{-- Hero --}}
    <div class="max-w-4xl mx-auto text-center py-20">
        <h1 class="text-6xl font-bold mb-6">Merhaba, ben Kadir!</h1>
        <p class="text-gray-400 text-xl mb-10">Yönetim Bilişim Sistemleri öğrencisi & Full Stack Developer</p>
        <a href="/hakkimda" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
            Beni Daha Yakından Tanıyın
        </a>
    </div>

    {{-- İstatistikler --}}
    <div class="max-w-4xl mx-auto mb-20">
        <div class="grid grid-cols-3 gap-6 text-center">
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-4xl font-bold mb-2">{{ $stats['projects'] }}</p>
                <p class="text-gray-400 text-sm">Proje</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-4xl font-bold mb-2">{{ $stats['experiences'] }}</p>
                <p class="text-gray-400 text-sm">Deneyim</p>
            </div>
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                <p class="text-4xl font-bold mb-2">{{ $stats['certificates'] }}</p>
                <p class="text-gray-400 text-sm">Sertifika</p>
            </div>
        </div>
    </div>

    {{-- Deneyimler --}}
    @if($experiences->isNotEmpty())
        <div class="max-w-4xl mx-auto mb-20">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Deneyimler</h2>
                <a href="/deneyimler" class="text-gray-400 hover:text-white transition text-sm">Tümünü Gör →</a>
            </div>
            <div class="space-y-4">
                @foreach($experiences as $experience)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-lg">{{ $experience->role }}</h3>
                            <p class="text-gray-400 mt-1">{{ $experience->company }}</p>
                        </div>
                        <span class="text-gray-500 text-sm flex-shrink-0 ml-4">
                            {{ $experience->start_date }} — {{ $experience->is_current ? 'Devam ediyor' : $experience->end_date }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Öne Çıkan Projeler --}}
    @if($projects->isNotEmpty())
    <div class="max-w-4xl mx-auto mb-20">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold">Öne Çıkan Projeler</h2>
            <a href="/projeler" class="text-gray-400 hover:text-white transition text-sm">Tümünü Gör →</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <a href="/projeler/{{ $project->id }}" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition block">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-36 object-cover rounded-lg mb-4">
                    @endif
                    <span class="text-xs text-gray-500 uppercase tracking-widest">{{ $project->category }}</span>
                    <h3 class="font-semibold mt-2 mb-2">{{ $project->title }}</h3>
                    <p class="text-gray-400 text-sm">{{ Str::limit($project->description, 80) }}</p>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    {{-- Beceriler --}}
    @if($skills->isNotEmpty())
    <div class="max-w-4xl mx-auto mb-20">
        <h2 class="text-2xl font-bold mb-8">Beceriler & Teknolojiler</h2>
        @foreach($skills->groupBy('category') as $category => $group)
            <div class="mb-8">
                <h3 class="text-gray-500 uppercase tracking-widest text-xs mb-4">{{ $category }}</h3>
                <div class="flex flex-wrap gap-3">
                    @foreach($group as $skill)
                        <span class="bg-gray-900 border border-gray-800 text-gray-300 px-4 py-2 rounded-lg text-sm">
                            {{ $skill->name }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
    @endif

    {{-- İletişim --}}
    <div class="max-w-4xl mx-auto mb-20 text-center">
        <h2 class="text-2xl font-bold mb-4">İletişime Geç</h2>
        <p class="text-gray-400 mb-8">Bir proje fikrin mi var? Benimle çalışmak ister misin?</p>
        <div class="flex justify-center gap-6">
            <a href="mailto:kadir@kadiripek.com" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                E-posta Gönder
            </a>
            <a href="https://linkedin.com/in/kadiripek" target="_blank" class="border border-gray-700 text-gray-400 px-6 py-3 rounded-lg hover:text-white hover:border-gray-500 transition">
                LinkedIn
            </a>
        </div>
    </div>

@endsection