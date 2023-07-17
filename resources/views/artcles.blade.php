@extends('app')

@section('content')
  @isset ( $request_error )
  <h2 style="color:red;">{{ $request_error }}</h2>
  @endisset
  <!-- show artcles page, every page show five posts -->
  <h1>{{ $pagetitle }}</h1> 
  <x-artcles :artcles="$artcles"/>
@endsection
