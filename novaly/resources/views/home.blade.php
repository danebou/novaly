@extends('layouts.master', ['id' => 'home'])

@section('header')
    @component('layouts.jumbotron')
        @slot('heading')
            Get your shopping game on!
        @endslot

        <p>Shop. Search. Read. Buy. Review. At your hearts desire!</p>
        <p><a class="btn btn-primary btn-lg" href="{{ route('products') }}" role="button">Get Started &raquo;</a></p>

    @endcomponent
@endsection

@section('content')

@endsection
