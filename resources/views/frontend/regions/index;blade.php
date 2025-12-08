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
    <h1 class="text-4xl font-bold mb-8">Régions du Bénin</h1>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($regions as $region)
        <a href="{{ route('frontend.regions.show', $region) }}"
           class="bg-white shadow-lg rounded-xl p-6 hover:scale-105 transition duration-300">
            <h3 class="text-2xl font-bold">{{ $region->nom }}</h3>
            <p class="text-gray-600 mt-2">{{ Str::limit($region->description, 100) }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection
