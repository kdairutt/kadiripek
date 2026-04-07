@extends('layouts.app')

@section('title', $project->title)

@section('content')
    <div class="max-w-4xl mx-auto">

        @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}"
                class="w-full h-80 object-cover rounded-2xl mb-8">
        @endif

        <div class="flex items-center gap-3 mb-4">
            <span class="text-xs text-gray-500 uppercase tracking-widest bg-gray-900 px-3 py-1 rounded-full">
                {{ $project->category }}
            </span>
        </div>

        <h1 class="text-4xl font-bold mb-4">{{ $project->title }}</h1>
        <p class="text-gray-400 text-lg leading-relaxed mb-8">{{ $project->description }}</p>

        <div class="flex gap-4">
            @if($project->link_url)
                <a href="{{ $project->link_url }}" target="_blank"
                    class="bg-white text-gray-900 px-6 py-3 rounded-lg font-semibold hover:bg-gray-200 transition">
                    {{ $project->link_label ?? 'Bağlantıya Git' }} →
                </a>
            @endif
        </div>

        <div class="mt-10 flex justify-between items-center">
            <a href="/projeler" class="text-gray-500 hover:text-white transition">← Tüm Projeler</a>
            @if(session('admin_logged_in'))
                <a href="/admin/projects/{{ $project->id }}/edit"
                    class="border border-gray-700 text-gray-400 px-4 py-2 rounded-lg hover:text-white hover:border-gray-500 transition text-sm">
                    Düzenle
                </a>
            @endif
        </div>

    </div>
@endsection