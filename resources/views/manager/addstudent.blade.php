<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" 
      type="image/png"
      sizes="32x32"
      href="{{ asset('img/favicon.png') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> 
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>M-sab Education</title>
</head>
<body>
    <header>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="w-full text-gray-700 bg-indigo-200 dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
            <div class="p-4 flex flex-row items-center justify-between">
            <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline">M-sab Education</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('manager.profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('manager.home') }}">Home</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-blue-400" href="{{ route('manager.logout') }}">Logout</a>   
            </nav>
        </div>
        </div>
    </header>
    <div class="flex items-center justify-center">
    <div class="flex justify-center pt-10 bg-gray-100 w-7/12 mt-10 rounded-lg py-10 shadow-xl">
    <form action="{{ route('manager.uploadstudent') }}" method="post">
    @csrf
    <div class="text-center mb-7">
        <h1 class="text-5xl uppercase bold">
            Add Student
        </h1>
    </div>
    <label class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">Full name</label>
    <input type="text" required name="name" placeholder="add name" class="block shadow-5xl mb-5 p-2 w-80 italic
    placeholder-gray-400">
    <label class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">Email</label>
    <input type="text" required name="email" placeholder="add email" class="block shadow-5xl mb-5 p-2 w-80 italic
    placeholder-gray-400">
    <label class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">Password</label>
    <input type="password" required name="password" placeholder="add password" class="block shadow-5xl mb-5 p-2 w-80 italic
    placeholder-gray-400">
    <label for="class_name" class="block uppercase tracking-wide text-gray-700 text-xl font-bold mb-2">Choose a class:</label>
        <select id="class" name="class_name_id" class="block shadow-5xl mb-5 p-2 w-80 italic" required>
        <option value="1">Classe One</option>
        <option value="2">Classe Two</option>
        <option value="3">Class Three</option>
        <option value="4">Classe four</option>
        <option value="5">Classe five</option>
        <option value="6">Classe six</option>
        </select>
    <input type="submit" name="submit" class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-blue-400">
    </form>
    </div>
    </div>
</body>
</html>