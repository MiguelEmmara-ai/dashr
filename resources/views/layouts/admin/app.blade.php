<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="{{ asset('/admin/assets/') }}"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <!-- SEO -->
    {!! SEO::generate() !!}

    <meta name="description" content="" />

    @stack('prepend-style')
    @include('includes.admin.style')
    @stack('addon-style')

    <!-- Helpers -->
    <script src="{{ asset('/admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('/admin/assets/js/config.js') }}"></script>

</head>

<body>
    @include('sweetalert::alert')

    @include('includes.admin.navbar')
    @include('includes.admin.sidebar')
    @yield('content')
    @include('includes.admin.footer')

    @stack('prepend-script')
    @include('includes.admin.script')
    @stack('addon-script')
</body>

</html>
