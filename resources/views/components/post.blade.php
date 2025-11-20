@props(['post', 'utente'])

<li class="post bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6 mb-4 border border-gray-100" data-id="{{ $post->id }}">
    {{-- Titolo --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-3 leading-tight">{{ $post->titolo }}</h2>

    {{-- Autore --}}
    <a href="{{ route('viewAccount', ['id_user' => $post->utente->id]) }}" class="inline-block mb-4">
        <h4 class="text-lg font-semibold text-blue-600 hover:text-blue-800 transition-colors duration-200">
            Di: {{ $post->utente->username }}
        </h4>
    </a>

    {{-- Descrizione --}}
    <p class="text-gray-600 mb-4 leading-relaxed text-base">{{ $post->descrizione }}</p>

    {{-- Data pubblicazione --}}
    <small class="text-sm text-gray-500 block mb-4">Pubblicato il: {{ $post->created_at }}</small>

    {{-- Contatore likes e bottoni --}}
    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
        {{-- Likes count --}}
        <p class="likes-count text-lg font-medium text-gray-700">
            Likes: <span>{{ $post->liked_by_count }}</span>
        </p>

        {{-- Bottoni --}}
        <div class="flex items-center gap-3">
            {{-- Bottone like --}}
            @if($post->likedBy()->where('id_user',$utente->id)->exists())
                <button class="like bg-gray-200 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                     Non mi piace più
                </button>
            @else
                <button class="like bg-gray-200 hover:bg-gray-700 hover:text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                    Mi piace
                </button>
            @endif

            {{-- Bottone elimina --}}
            @if($post->utente->id === $utente->id)
                <form action="{{route('deletePost',['id_post'=>$post->id])}}" method="post">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 font-medium text-sm">
                        🗑️ Elimina
                    </button>
                </form>
            @endif
        </div>
    </div>
</li>