@extends('app')

@section('content')

<h1>Welcome {{ Auth::user()->name }}</h1>
<p>You're logged in!</p>

@endsection
