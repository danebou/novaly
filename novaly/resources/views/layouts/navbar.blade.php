@if (!isset($basic) || !$basic)

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'novaly') }}</a>
        </div>

        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-center" method="GET" action="{{ route('products') }}">
                <div class="input-group">

                    <input id="search" type="text" placeholder="Search..." class="form-control" name="search">

                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>

                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ auth()->user()->given_name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            @if (auth()->user()->isVendor())

                            <li>
                                <a href="{{ route('vendors.products') }}">
                                    Your Products
                                </a>
                            </li>

                            @elseif (auth()->user()->isBuyer())

                            <li>
                                <a href="{{ route('purchase_orders') }}">
                                    Your Orders
                                </a>
                            </li>

                            @endif

                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div> <!--/.navbar-collapse -->
    </div>
</nav>

@else

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand" href="{{ route('home') }}">{{ config('app.name', 'novaly') }}</a>

        </div>
    </div>
</nav>

@endif
