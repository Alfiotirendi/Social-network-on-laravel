@extends('layouts.app')

@section('title', 'Seguiti')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Seguiti</h2>

        @if($followed->isEmpty())
            <p class="text-gray-500 text-lg">Nessun utente seguito</p>
        @else
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($followed as $f)
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
        @endif
    </div>
</div>
@endsection