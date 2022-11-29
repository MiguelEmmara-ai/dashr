<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('prepend-style')
    @include('includes.admin.style')
    @stack('addon-style')

</head>

<body style="background: #f3f2f3;">

    @include('includes.admin.navbar')
    @yield('content')
    @include('includes.admin.footer')

    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>
