@extends('layouts.app', ['includeFollow' => true])

@section('title', 'Profilo')

@section('content')
    <div class="max-w-4xl mx-auto">
        {{-- Header profilo --}}
        <div class="bg-white rounded-xl shadow-lg p-8 mb-6 border border-gray-100">
            {{-- Titolo --}}
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Profilo di {{$profile->username}}</h1>

            {{-- Statistiche follower/following --}}
            <div class="follower flex items-center gap-6 mb-6" data-id="{{$profile->id}}">
                <a href="{{route('followers',['id_user'=>$profile->id])}}" class="hover:scale-105 transition-transform duration-200">
                    <p class="followers-count text-lg font-semibold text-gray-700 hover:text-blue-600 transition-colors">
                        Followers: <span class="text-blue-600">{{ $profile->followers_count }}</span>
                    </p>
                </a>
                <a href="{{route('followed',['id_user'=>$profile->id])}}" class="hover:scale-105 transition-transform duration-200">
                    <p class="following-count text-lg font-semibold text-gray-700 hover:text-blue-600 transition-colors">
                        Seguiti: <span class="text-blue-600">{{ $profile->following_count }}</span>
                    </p>
                </a>

                
                @if($profile->followers()->where('follower_id',$utente->id)->exists())
                    <button class="follow bg-red-500 hover:bg-red-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 font-medium text-base">
                         Segui già
                    </button>
                @elseif($profile->id === $utente->id)
                @else
                    <button class="follow bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors duration-200 font-medium text-base">
                        Segui
                    </button>
                @endif
            </div>

            <small class="text-sm text-gray-500">Creato il: {{ $profile->created_at }}</small>
        </div>

        {{-- Post recenti --}}
        <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Post Recenti di {{$profile->username}}</h2>

            @if($posts->isEmpty())
                <p class="text-gray-500 text-lg text-center py-8">Nessun post disponibile.</p>
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