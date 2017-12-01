@extends('layouts.basic')

@section('header')
    @component('layouts.jumbotron')
        @slot('heading')
            @yield('message')
        @endslot
    @endcomponent
@endsection
