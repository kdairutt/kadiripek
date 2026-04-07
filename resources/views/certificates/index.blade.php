@extends('layouts.app')

@section('title', 'Sertifikalar')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-10">Sertifikalar</h1>

        @if($certificates->isEmpty())
            <p class="text-gray-400">Henüz sertifika eklenmemiş.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($certificates as $certificate)
                    <div class="bg-gray-900 border border-gray-800 rounded-xl p-6 flex gap-4 items-start">
                        @if($certificate->image)
                            <img src="{{ asset('storage/' . $certificate->image) }}"
                                class="w-16 h-16 object-cover rounded-lg flex-shrink-0">
                        @endif
                        <div>
                            <h2 class="font-semibold text-lg">{{ $certificate->title }}</h2>
                            <p class="text-gray-400 text-sm mt-1">{{ $certificate->issuer }}</p>
                            <p class="text-gray-500 text-sm mt-1">{{ $certificate->date }}</p>
                            @if($certificate->credential_url)
                                <a href="{{ $certificate->credential_url }}" target="_blank"
                                    class="text-gray-400 hover:text-white text-sm mt-2 inline-block transition">
                                    Sertifikayı Gör →
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection