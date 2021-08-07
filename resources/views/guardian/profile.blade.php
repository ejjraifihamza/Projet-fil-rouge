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
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('guardian.profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-blue-400" href="{{ route('guardian.logout') }}">Logout</a> 
            </nav>
        </div>
        </div>
    </header>
    @foreach ($guardians as $guardian)
    <div class="flex items-center justify-center">
        <div class="bg-gray-100 w-7/12 mt-10 rounded-lg py-10 shadow-xl">
          <div class="flex items-center justify-center pt-5 flex-col">
            <img src="https://www.shareicon.net/data/512x512/2016/05/24/770137_man_512x512.png" class="rounded-full w-32">
            <h1 class="text-gray-800 font-semibold text-xl mt-5">{{ $guardian->name }}</h1>
            <h1 class="text-gray-500 mt-8 text-sm">Youssoufia, Maroc</h>
              <h1 class="text-gray-500 text-sm p-4 text-center">
                Email : {{ $guardian->email }}
              </h1>
              <h1 class="text-gray-500 text-sm p-4 text-center">
                @if ($guardian->User->class_name = 1)
                        Student classe : class 1
                    @elseif ($guardian->User->class_name = 2)
                        Student classe : class 2
                    @elseif ($guardian->User->class_name = 3)
                        Student classe : class 3
                    @elseif ($guardian->User->class_name = 4)
                        Student classe : class 4
                    @elseif ($guardian->User->class_name = 5)
                    ²   Student classe : class 5
                    @elseif ($guardian->User->class_name = 6)
                        Student classe : class 6
                @endif
              </h1>
          </div>
          <div class="text-center">
            <div>
              <h1 class="text-xs uppercase text-gray-500">Student name :</h1>
              <h1 class="text-xs text-yellow-500">{{ $guardian->User->name }}</h>
            </div>
          </div>
          
        </div>
      
      </div>
        
    @endforeach
</body>
</html>