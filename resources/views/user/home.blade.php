@extends('layouts.app') 


@section('content')
<h1>Hello Student</h1>

<a href="{{ route('user.logout') }}">Logout</a>






@endsection