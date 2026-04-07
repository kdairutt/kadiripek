@extends('layouts.app')

@section('title', 'Deneyimler')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-10">Deneyimler</h1>

        @if($experiences->isEmpty())
            <p class="text-gray-400">Henüz deneyim eklenmemiş.</p>
        @else
            <div class="space-y-6">
                @foreach($experiences as $experience)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <h2 class="text-xl font-semibold">{{ $experience->role }}</h2>
                                <p class="text-gray-400 mt-1">{{ $experience->company }}</p>
                            </div>
                            <span class="text-gray-500 text-sm flex-shrink-0 ml-4">
                                {{ $experience->start_date }} — {{ $experience->is_current ? 'Devam ediyor' : $experience->end_date }}
                            </span>
                        </div>
                        @if($experience->description)
                            <p class="text-gray-400 mt-4 leading-relaxed">{{ $experience->description }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection