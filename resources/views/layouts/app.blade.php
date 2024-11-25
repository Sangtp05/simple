<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include("layouts.css")
    @stack('styles')
    @include("layouts.js")
    @stack('head-scripts')
</head>
<body>
    @include('components.header')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    @yield('scripts')
</body>
    @stack('scripts')
</html> 