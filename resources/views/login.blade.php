<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-green-800 flex justify-center item-center  mt-6">
    <div class=" w-1/4 bg-white/95 p-6 rounded-lg shadow-md flex flex-col justify-center items-center text-left ">
    <div class="text-xl font-bold mb-4">FootballBook</div>
    <h1 class="text-l font-semibold mb-5 ">Login Page</h1>
    <form method="POST" action="{{route('LoginSubmit')}}" class="flex flex-col justify-between items-center justify-center w-full">
        @csrf
        <div class="flex justify-between mb-4 w-full "><label for="username">Username:</label>
        <input class="border-2 border-black"  type="text" id="username" name="username" required>
        </div>
        <div class="flex justify-between mb-4 w-full "><label for="password">Password:</label>
        <input class="border-2 border-black" type="password" id="password" name="password"  required minlength="8" pattern="(?=.*[A-Z]).*">
        </div>
        
        <button class="w-2/6 h-8 bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded flex items-center justify-center mb-4" type="submit">Login</button>
    </form>
    <a class="w-50 h-15 bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded flex items-center text-center mb-4" href="{{route('RegisterForm')}}">Non hai un account? Registrati qui</a>
    @if ($errors->any())
    <div class="w-50 h-7 bg-red-500  text-white font-semibold px-4 py-2 rounded flex items-center text-center mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>
</body>
</html>