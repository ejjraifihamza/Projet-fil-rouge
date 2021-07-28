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
        <div class="header-2">
            <nav class="bg-white py-2 md:py-4">
              <div class="container px-4 mx-auto md:flex md:items-center">
                    <div class="flex justify-between items-center">
                    <a href="/" class="font-bold text-xl text-indigo-600">M-sab Education</a>
                    <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden" id="navbar-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    </div>
          
                    <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
                    <span class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">{{ Auth::user()->name }}</span>
                    <a class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300" href="{{ route('student.correctupload') }}">Your Correct</a>
                    <a class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300" href="#">Assignment</a>
                    <a class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600" href="{{ route('user.logout') }}">Logout</a>
                    </div>
              </div>
            </nav>
        </div>
    </header>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                cours
            </h1>
        </div>
        <div class="pt-10">
            <a href="student/uploadpage"
            class="border-b-2 pb-2 border-dotted italic text-gray-500"
            >Add Your Correction &rarr;</a>
        </div>
        <div class="w-5/6 py-10">
            @foreach ($data as $cours)
                <div class="m-auto">
                    <div class="float-right">
                        <a class="border-b-2 pb-2 border-dotted italic text-green-500"
                        href="{{ route('user.viewhomework', $cours->id) }}">
                            view &rarr;
                        </a>
                        <br><br>
                        <a class="border-b-2 pb-2 border-dotted italic text-red-500"
                        href="{{ route('user.downloadhomework', $cours->file_path) }}">
                            Download &rarr;
                        </a>
                      
                    </div>
                    <iframe src="{{ asset('assets/' . $cours->file_path) }}" class="w-48 mb-8 shadow-xl" width="300" height="300" alt=""></iframe>
                    <span class="uppercase text-red-500 font-bold text-xs italic">
                        deadline {{ $cours->deadline }}
                    </span>
                    <h2 class="text-gray-700 text-5xl hover:text-gray-500">
                        <a href="/teacher/{{ $cours->id }}">
                            {{ $cours->name }}
                        </a>
                    </h2>
                    <p class="text-lg text-gray-700 py-6">
                        {{ $cours->description }}
                    </p>
                    <hr class="mt-4 mb-8">
                </div>
            @endforeach
        </div>
        {{ $data->links() }}
    </div>
  
</body>
</html>