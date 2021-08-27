<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Server Management</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="w-full flex flex-row">
    @include('components.sidebar')
    <div class="w-full-64 bg-gray-200 px-32 py-24">
        <div class="bg-white rounded h-auto px-9 py-6">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>
