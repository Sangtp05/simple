<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Default CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Stack cho CSS -->
    @stack('styles')
    
    <!-- Stack cho JS ở head -->
    @stack('head-scripts')
</head>
<body class="flex flex-col min-h-screen bg-gray-50">
    @include('components.header')

    <main class="flex-grow">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    @include('components.footer')

    @yield('scripts')
</body>
</html> 