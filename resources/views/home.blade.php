@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="max-w-4xl mx-auto space-y-8">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Benvenuto {{$utente->username}}</h1>
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Post Recenti</h2>

        @if($followedPost->isEmpty())
            <p class="text-gray-500 text-lg">Nessun post disponibile.</p>
        @else
            <ul class="space-y-4">
                @foreach($followedPost as $post)
                    <x-post :post="$post" :utente="$utente" />
                @endforeach
            </ul>
        @endif
    </div>

    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Post suggeriti:</h2>

        @if($suggestedPost->isEmpty())
            <p class="text-gray-500 text-lg">Nessun post suggerito.</p>
        @else
            <ul class="space-y-4">
                @foreach($suggestedPost as $post)
                    <x-post :post="$post" :utente="$utente" />
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection