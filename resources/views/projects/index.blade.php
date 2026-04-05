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
                        <h2 class="text-xl font-semibold mt-2 mb-3">{{ $project->title }}</h2>
                        <p class="text-gray-400 text-sm">{{ $project->description }}</p>
                        <div class="flex gap-4 mt-4">
                            @if($project->url)
                                <a href="{{ $project->url }}" class="text-sm text-white hover:underline">Siteye Git →</a>
                            @endif
                            @if($project->github_url)
                                <a href="{{ $project->github_url }}" class="text-sm text-gray-400 hover:underline">GitHub →</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
