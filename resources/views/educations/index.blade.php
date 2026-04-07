@extends('layouts.app')

@section('title', 'Eğitim')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-10">Eğitim</h1>

        @if($educations->isEmpty())
            <p class="text-gray-400">Henüz eğitim eklenmemiş.</p>
        @else
            <div class="space-y-6">
                @foreach($educations as $education)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <span class="text-xs text-gray-500 uppercase tracking-widest">{{ $education->type }}</span>
                                <h2 class="text-xl font-semibold mt-1">{{ $education->department }}</h2>
                                <p class="text-gray-400 mt-1">{{ $education->school }}</p>
                            </div>
                            <span class="text-gray-500 text-sm flex-shrink-0 ml-4">
                                {{ $education->start_year }} — {{ $education->is_current ? 'Devam ediyor' : $education->end_year }}
                            </span>
                        </div>
                        @if($education->description)
                            <p class="text-gray-400 mt-4 leading-relaxed">{{ $education->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection