<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('partials.header')

        @yield('content')

        @include('partials.footer')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @if(isset($isContact))
    <script src="{{ asset('js/contact.js') }}"></script>
    @endif
     @if(isset($isContactUs))
    <script src="{{ asset('js/contact-us.js') }}"></script>
    @endif
    @if(isset($isCalculator))
    <script src="{{ asset('js/calculator.js') }}"></script>
    @endif

</body>
</html>
