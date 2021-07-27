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
                    <a class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600" href="{{ route('teacher.logout') }}">Logout</a>
                    </div>
              </div>
            </nav>
        </div>
    </header>
    <form action="{{ route('teacher.uploadfile') }}" method="post" enctype="multipart/form-data">
        @csrf
    <input type="text" name="name" placeholder="cours name">
    <input type="text" name="description" placeholder="cours discription">
    <input type="date" name="deadline">
    <input type="file" name="file_path">
    <input type="submit" name="submit" id="">
    </form>
  
</body>
</html>