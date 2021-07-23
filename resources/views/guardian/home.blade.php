@extends('layouts.app') 


@section('content')
<h1>Hello Guardian</h1>

<a href="{{ route('guardian.logout') }}">Logout</a>






@endsection