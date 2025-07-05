<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Tropical Cane') }} - Admin Login</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/TC_LOGO.jpg') }}?v={{ time() }}" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #2a6a2a 0%, #4a9a4a 100%);
            min-height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
            margin: 1.5rem auto;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-6">
            <a href="/">
                <img src="{{ asset('image.s/tc_logo.PNG') }}" alt="Tropical Cane Logo" class="w-16 h-16 object-cover rounded-lg">
            </a>
        </div>
        <div class="login-container">
            {{ $slot }}
        </div>
    </div>
</body>
</html>