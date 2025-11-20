@extends('layouts.app')

@section('title', 'Cerca')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Cerca un utente</h2>
        
        <form action="{{route('Search')}}" method="get" class="space-y-6 mb-8">
            <div class="flex flex-col gap-2">
                <input type="text" id="username" name="username" placeholder="Inserisci username..."
                       class="border-2 border-gray-300 rounded-lg px-4 py-2 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors" required>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg transition-colors duration-200">
                Cerca
            </button>
        </form>

        @if($first)
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">Prova a cercare un utente</p>
            </div>
        @else
            @if($users->isEmpty())
                <div class="text-center py-8">
                    <p class="text-gray-500 text-lg">Nessun utente trovato</p>
                </div>
            @else
                <div class="mt-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Risultati della ricerca</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($users as $f)
                            <li class="follower bg-gray-50 rounded-lg p-4 border border-gray-200 hover:shadow-md transition-shadow duration-200" data-id="{{$f->id}}">
                                <div class="flex items-center justify-between">
                                    <a href="{{route('viewAccount',['id_user'=>$f->id])}}" class="hover:text-blue-600 transition-colors flex-1">
                                        <h4 class="text-lg font-semibold text-gray-800">{{ $f->username }}</h4>
                                    </a>
                                    
                                    <div class="ml-4">
                                        @if($f->followers()->where('follower_id',$utente->id)->exists())
                                            <button class="follow bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 text-sm font-medium">
                                                Segui già
                                            </button>
                                        @elseif($f->id===$utente->id)
                                            <span class="text-gray-400 text-sm">Tu</span>
                                        @else 
                                            <button class="follow bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors duration-200 text-sm font-medium">
                                                Segui
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection