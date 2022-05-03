<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
</head>

<body>

    @if (Route::has('login'))

    @auth
    @if (Auth::user()->utype==='admin')
    <a href="#">My account (Admin)</a>
    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    <a href="{{ route('admin.service_categories') }}">Service categories</a>
    <a href="{{ route('admin.all_services') }}">Service</a>
    <a href="{{ route('admin.slider') }}">Slider</a>
    <a href="{{ route('logout') }}">Logout</a>
    @elseif (Auth::user()->utype==='provider')
    <a href="#">My account (Service Provider)</a>
    <a href="{{ route('provider.dashboard') }}">Dashboard</a>
    <a href="{{ route('logout') }}">Logout</a>
    @else
    <a href="#">My account (Customer)</a>
    <a href="{{ route('customer.dashboard') }}">Dashboard</a>
    <a href="{{ route('logout') }}">Logout</a>
    @endif
    @else
    <nav>
        <ul>
            <li><a href="{{ route('register') }}">Register</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('home.service_categories') }}">service categories</a></li>
        </ul>
    </nav>
    @endif

    @endif



    {{$slot}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>

    @stack('scripts')

    @livewireScripts
</body>

</html>