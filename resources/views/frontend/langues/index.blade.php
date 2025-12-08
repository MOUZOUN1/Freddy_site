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
    <h1 class="text-4xl font-bold mb-8">Les Langues du Bénin</h1>

    <div class="grid md:grid-cols-3 gap-6">
        @foreach ($langues as $langue)
        <a href="{{ route('frontend.langues.show', $langue) }}"
           class="bg-white p-6 rounded-xl shadow-md hover:scale-[1.02] transition">
            <h3 class="text-2xl font-semibold">{{ $langue->nom }}</h3>
            <p class="text-gray-600 mt-2">{{ Str::limit($langue->description, 120) }}</p>
        </a>
        @endforeach
    </div>
</div>
@endsection
