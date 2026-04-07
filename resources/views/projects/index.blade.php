@extends('layouts.app')

@section('title', 'Projeler')

@section('content')
    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-bold mb-10">Projeler</h1>

        @if($projects->isEmpty())
            <p class="text-gray-400">Henüz proje eklenmemiş.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($projects as $project)
                    <div class="bg-gray-900 rounded-xl p-6 border border-gray-800">
                        <span class="text-xs text-gray-500 uppercase tracking-widest">{{ $project->category }}</span>
                        <a href="/projeler/{{ $project->id }}"> 
                            <h2 class="text-xl font-semibold mt-2 mb-3">{{ $project->title }}</h2>
                        </a>
                        <p class="text-gray-400 text-sm">{{ $project->description }}</p>
                        <div class="flex gap-4 mt-4">
                            <div class="flex gap-4 mt-4">
                                @if($project->link_url)
                                    <a href="{{ $project->link_url }}" target="_blank" class="text-sm text-white hover:underline">
                                        {{ $project->link_label ?? 'Bağlantıya Git' }} →
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
