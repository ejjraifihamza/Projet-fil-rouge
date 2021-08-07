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
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teacher.profile', Auth::user()->id) }}">{{ Auth::user()->name }}</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teacher.cours') }}">Cours</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teacher.studentspage') }}">Students</a>
                <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-blue-500 focus:bg-gray-200 focus:outline-none focus:shadow-outline bg-blue-400" href="{{ route('teacher.logout') }}">Logout</a>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                        <span>Homework</span>
                        <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                        <div class="py-4 bg-white rounded-md shadow dark-mode:bg-gray-800">
                            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teacher.home') }}"> My Assignment</a>
                            <a class="px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('teacher.student.homework') }}">Student Homework</a>
                        </div>
                    </div>
                </div>    
            </nav>
        </div>
        </div>
    </header>
    <div class="m-auto w-4/5 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                correct homework
            </h1>
        </div>
        <div class="w-5/6 py-10">
            @foreach ($studenthomeworks as $studenthomework)
                <div class="m-auto">
                    <div class="float-right mt-10">
                        <a class="border-b-2 pb-2 border-dotted italic text-green-500"
                            href="{{ route('teacher.viewstudenthomework', $studenthomework->id) }}">
                            view &rarr;
                        </a>
                        <br><br>
                        <a class="border-b-2 pb-2 border-dotted italic text-red-500"
                        href="{{ route('teacher.downloadstudenthomework', $studenthomework->file_path) }}">
                            Download &rarr;
                        </a>
                    </div>
                    <div class="pt-10 mb-10">
                        <a href="{{ route('teacher.correct.uploadpage', $studenthomework->id) }}"
                        class="border-b-2 pb-2 border-dotted italic text-gray-500"
                        >Add Your Correction &rarr;</a>
                    </div>
                    <iframe src="{{ asset('studentassets/' . $studenthomework->file_path) }}" class="w-48 mb-8 shadow-xl" width="300" height="300" alt=""></iframe>
                    {{ $studenthomework->subject }}
                    <br>
                    {{ $studenthomework->TeacherHomework->description }}
                    <br>
                    {{ $studenthomework->User->name }}
                    <br>
                    @if ($studenthomework->class_name_id = 1)
                        class 1
                    @elseif ($studenthomework->class_name_id = 2)
                        class 2
                    @elseif ($studenthomework->class_name_id = 3)
                        class 3
                    @elseif ($studenthomework->class_name_id = 4)
                        class 4
                    @elseif ($studenthomework->class_name_id = 5)
                        class 5
                    @elseif ($studenthomework->class_name_id = 5)
                        class 6
                    @endif
                </div>
                <hr class="mt-4 mb-8">
            @endforeach
        </div>
    </div>
  
</body>
</html>