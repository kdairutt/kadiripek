@extends('layouts.app')

@section('title', 'Ana Sayfa')

@section('content')
    <div class="max-w-4xl mx-auto text-center py-20">
        <h1 class="text-6xl font-bold mb-6">Merhaba, ben Kadir!</h1>
        <p class="text-gray-400 text-xl mb-8">Full Stack Developer</p>
        <a href="/projeler" class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
            Projelerimi Gör
        </a>
    </div>
@endsection