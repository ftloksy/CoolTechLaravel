@extends('app')

@section('content')
<!-- show single full artcle's page -->
<h3>{{ $bookmarkmsg }}</h3>
<x-artcle :artcle="$artcle" :type="'full'" />
@endsection
