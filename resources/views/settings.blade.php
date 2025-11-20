@extends('layouts.app')

@section('title', 'Impostazioni')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 mb-6 border border-gray-100">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Impostazioni account di {{$utente->username}}</h1>
        
        <form action="{{route('updateSettings')}}" method="POST" class="space-y-6">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="username" class="text-lg font-medium text-gray-700">Nuovo username:</label>
                <input type="text" id="username" name="username" value="{{$utente->username}}" 
                       class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors" required>
            </div>
            
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                Aggiorna Impostazioni
            </button>
        </form>
        
        <form action="{{route('deleteAccount')}}" method="POST" 
              onsubmit="return confirm('Sei sicuro di voler eliminare il tuo account? Questa azione non può essere annullata.');"
              class="mt-8 pt-6 border-t border-gray-200">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                Elimina Account
            </button>
        </form>
    </div>
</div>
@endsection