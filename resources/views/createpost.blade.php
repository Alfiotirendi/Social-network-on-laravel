@extends('layouts.app')

@section('title', 'Nuovo Post')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Crea Nuovo Post</h2>
        
        <form action="{{route('createPost')}}" method="POST" class="space-y-6">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="titolo" class="text-lg font-medium text-gray-700">Titolo:</label>
                <input type="text" id="titolo" name="titolo" 
                       class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors" required>
            </div>
            
            <div class="flex flex-col gap-2">
                <label for="descrizione" class="text-lg font-medium text-gray-700">Descrizione:</label>
                <textarea id="descrizione" name="descrizione" 
                          class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors h-32 resize-none" 
                          required minlength="10"></textarea>
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                Crea Post
            </button>
        </form>
    </div>
</div>
@endsection