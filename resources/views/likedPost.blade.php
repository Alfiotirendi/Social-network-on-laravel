@extends('layouts.app')

@section('title', 'Post che ti piacciono')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Ecco i post a cui hai messo mi piace</h2>

        @if($posts->isEmpty())
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg mb-4">Nessun post disponibile.</p>
                <a href="{{route('home')}}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">
                    Guarda i Post suggeriti
                </a>
            </div>
        @else
            <ul class="space-y-4">
                @foreach($posts as $post)
                    <x-post :post="$post" :utente="$utente" />
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection