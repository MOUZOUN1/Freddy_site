@extends('frontend.layout')

@section('content')
<div class="max-w-3xl mx-auto py-12 px-6">

    <h1 class="text-3xl font-bold mb-6">{{ $media->titre }}</h1>

    @if(Str::contains($media->type, 'image'))
        <img src="{{ asset('storage/'.$media->fichier) }}" class="rounded-xl">
    @elseif(Str::contains($media->type, 'video'))
        <video controls class="w-full rounded-xl">
            <source src="{{ asset('storage/'.$media->fichier) }}">
        </video>
    @elseif(Str::contains($media->type, 'audio'))
        <audio controls class="w-full mt-4">
            <source src="{{ asset('storage/'.$media->fichier) }}">
        </audio>
    @endif

</div>
@endsection
