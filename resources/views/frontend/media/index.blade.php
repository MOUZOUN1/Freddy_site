@extends('frontend.layout')

@section('content')
<form method="GET" class="mb-6">
    <input 
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Rechercher..."
        class="w-full sm:w-80 p-3 border rounded-xl"
    >
</form>

<div class="max-w-7xl mx-auto py-12 px-6">
    <h1 class="text-4xl font-bold mb-8">Galerie des Médias</h1>

    <div class="grid md:grid-cols-4 gap-6">
        @foreach ($media as $item)
        <a href="{{ route('frontend.media.show', $item) }}" 
           class="block bg-white shadow rounded-xl overflow-hidden hover:scale-105 transition">
            
            <img src="{{ asset('storage/'.$item->fichier) }}" 
                 class="h-40 w-full object-cover">

        </a>
        @endforeach
    </div>
</div>
@endsection
