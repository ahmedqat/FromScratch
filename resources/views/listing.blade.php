@extends('layout')

@section('content')
@include('partials._search')


<h1> Your Listing </h1>

<p>
    <a href="/" > All Listings </a>

</p>


<h2> {{ $listing ['title'] }} </h2>

<p> {{ $listing ['description'] }} </p>


@endsection
