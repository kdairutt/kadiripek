@extends('layouts.app')

@section('title', 'Hakkımda')

@section('content')
    <div class="max-w-4xl mx-auto">

        {{-- Biyografi --}}
        <div class="mb-16">
            <h1 class="text-4xl font-bold mb-6">Hakkımda</h1>
            <p class="text-gray-400 text-lg leading-relaxed">
                Buraya kendi biyografini yazacaksın.
            </p>
        </div>

        {{-- Eğitim --}}
        <div class="mb-16">
            <h2 class="text-2xl font-bold mb-6">Eğitim</h2>
            <p class="text-gray-400 mb-4">Eğitim geçmişim hakkında daha fazla bilgi için:</p>
            <a href="/egitimler" class="border border-gray-700 text-gray-400 px-5 py-3 rounded-lg hover:text-white hover:border-gray-500 transition inline-block">
                Eğitimlerimi Gör →
            </a>
        </div>

        {{-- Bağlantılar --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="/projeler" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h3 class="font-semibold text-lg mb-2">Projeler</h3>
                <p class="text-gray-400 text-sm">Gerçekleştirdiğim projelere göz at</p>
            </a>
            <a href="/deneyimler" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h3 class="font-semibold text-lg mb-2">Deneyimler</h3>
                <p class="text-gray-400 text-sm">İş deneyimlerime göz at</p>
            </a>
            <a href="/sertifikalar" class="bg-gray-900 border border-gray-800 rounded-xl p-6 hover:border-gray-600 transition">
                <h3 class="font-semibold text-lg mb-2">Sertifikalar</h3>
                <p class="text-gray-400 text-sm">Aldığım sertifikalara göz at</p>
            </a>
        </div>

    </div>
@endsection