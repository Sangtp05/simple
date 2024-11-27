<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Tên Website')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.svg') }}">
    @stack('meta')
    @include("layouts.css")
    @stack('styles')
    @include("layouts.js")
    @stack('head-scripts')
</head>

<body>
    @include('components.header')

    <main>
        @if (!Route::is('homepage.index'))
        <x-breadcrumb />
        @endif
        @yield('content')
    </main>

    @include('components.footer')

    @yield('scripts')
</body>
@stack('scripts')

</html>