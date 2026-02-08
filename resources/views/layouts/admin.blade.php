<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Dashboard') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body
    class="bg-base-300 min-h-screen font-['Instrument_Sans'] min-h-screen text-base-content antialiased flex flex-col relative overflow-x-hidden">


    <!-- Navbar -->
    <div class="relative z-10">
        @include('layouts.partials.admin.header')
    </div>

    <!-- Content -->
    <div class="container mx-auto p-6 flex-grow relative min-h-screen">
        @yield('content')
    </div>

    <div class="relative z-10 mt-auto">
        @include('layouts.partials.admin.footer')
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>

    @stack('scripts')
</body>

</html>
