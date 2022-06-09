<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h1>{{ $flash->name }}</h1>
    <p>{{ $flash->tattooist->tattooist_name }}</p>

    <form action="{{ route('post', $flash->id) }}" method="POST">
        <div class="mb-3">
            @csrf
            <label for="exampleInputEmail1" class="form-label">Premier tatouage</label>
            <select name="firstTattoo" class="form-select" style="width: 30%;" required>
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>

        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Message</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="optionalMessage">
        </div>
        <div class="mb-3">
            <input type="date" class="form-control" id="calendar" name="date" placeholder="Select a date">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
</div>

{{-- @endsection --}}


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    var bool = {!! json_encode($dates_array) !!};

    console.log(bool);

    flatpickr('#calendar', {
                    "minDate": new Date().fp_incr(1),
                    disable: bool,
                    dateFormat: "Y-m-d",
});
</script>
