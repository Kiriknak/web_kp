<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? '' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @php
        $user = Auth::user();
    @endphp
</head>

<body>
    @include('layouts.navbar')

    <div class=" relative mx-auto mt-auto ">
        <br class="lg:hidden">
        @yield('content')
    </div>

</body>

</html>
