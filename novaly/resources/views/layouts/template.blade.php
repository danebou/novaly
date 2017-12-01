<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('favicon.ico') }}" rel="icon" type="image/x-icon">

    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name', 'novaly') }}
        @else
            {{ config('app.name', 'novaly') }}
        @endif
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')

</head>

<body class="nav-body">

    @include('layouts.navbar', compact('basic'))

    @yield('header')

    <div {{ isset($id) ? 'id=' . $id : ''}} class="container move-down20">

        @include('flash::message')

        @yield('content')

        <hr>

        <footer>

            @hasSection('footer')
                @yield('footer')
            @else
                <p>&copy; 2017 UCF COP4331, Team 7</p>
            @endif

        </footer>
    </div> <!-- /container -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

    @stack('scripts')

</body>

</html>
