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
    <div class="m-auto w-4/8 py-24">
        <div class="text-center">
            <h1 class="text-5xl uppercase bold">
                Update car
            </h1>
        </div>
    </div>
    <div class="flex justify-center pt-20">
        <form action="{{ route('teacher.updatefile',$cours->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $cours->id }}">
            {{-- @method('PUT') --}}
            <div class="block">
                <input type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic
                placeholder-gray-400"
                name="name"
                value="{{ $cours->name }}">

                <input type="text"
                class="block shadow-5xl mb-10 p-2 w-80 italic
                placeholder-gray-400"
                name="description"
                value="{{ $cours->description }}">

                <input type="date"
                class="block shadow-5xl mb-10 p-2 w-80 italic
                placeholder-gray-400"
                name="deadline">

                <input type="file"
                class="block shadow-5xl mb-10 p-2 w-80 italic
                placeholder-gray-400"
                name="path_file"
                value="{{ $cours->path_file }}">

                <button type="submit" class="bg-green-500 block shadow-5xl mb-10 p-2 w-80
                uppercase font-bold hover:bg-green-400">
                    Submit
                </button>
            </div>
        </form>
    </div>
    {{-- @if ($errors->any())
        <div class="w-4/8 m-auto text-center">
            @foreach ($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{ $error }}
                </li>
            @endforeach
        </div>
    @endif --}}
</body>
</html>