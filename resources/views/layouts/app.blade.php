<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/like.js') }}" defer></script>
    <script src="{{ asset('js/follow.js') }}" defer></script>

    <title>@yield('title')</title>
</head>
<body class="bg-green-800 min-h-screen flex justify-between ">
<div class="flex-1 p-6 flex justify-center">
    {{-- LEFT CONTENT --}}
    <div class="bg-white/95 shadow-xl rounded-xl p-6 w-full max-w-4xl">
        @yield('content')
    </div>
</div>

    {{-- RIGHT SIDEBAR --}}
    <div class="w-50 bg-white shadow-lg p-5 border-l border-gray-300">
        <h2 class="text-xl font-bold mb-4">Menu</h2>
        <ul class="flex flex-col gap-2">
            <li><a href="{{route('home')}}" class="text-blue-600 hover:underline">Home</a></li>
            <li><a href="{{route('likedPost')}}" class="text-blue-600 hover:underline">Post che ti piacciono</a></li>
            <li><a href="{{route('viewAccount',['id_user'=>$utente->id])}}" class="text-blue-600 hover:underline">Profilo</a></li>
            <li><a href="{{route('newPostForm')}}" class="text-blue-600 hover:underline">Crea un nuovo post</a></li>
            <li><a href="{{route('settings')}}" class="text-blue-600 hover:underline">Impostazioni</a></li>
            <li><a href="{{route('Search')}}" class="text-blue-600 hover:underline">Cerca profilo</a></li>
            <li><a href="{{route('logout')}}" class="text-blue-600 hover:underline">Logout</a></li>
        </ul>
    </div>

</body>
</html>