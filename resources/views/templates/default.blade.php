<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
    {{-- @include('templates.partials.navigation')
    <div class="container pt-4">
        @include('templates.partials.alerts')
        @yield('content')
    </div> --}}


    @include('templates.partials.navigation')
    @include('templates.partials.sidebar')
    <div class="container pt-4">
        @include('templates.partials.alerts')
        @yield('content')
    </div>

</body>
</html>
