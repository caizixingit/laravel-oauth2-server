@extends('client/base')
@section('content')
    <h4>Error Retrieving Access Token:</h4>
    @include('client/_error')

    <a href="{{ url('home') }}">back</a>
@endsection