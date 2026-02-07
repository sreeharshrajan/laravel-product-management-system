<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-base-300 font-['Instrument_Sans'] min-h-screen text-base-content antialiased flex flex-col relative overflow-x-hidden">

    <div class="absolute inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/10 rounded-full blur-[120px]">
        </div>
    </div>

    <!-- Navbar -->
    <div class="relative z-10">
        @include('layouts.partials.web.header')
    </div>

    <!-- Content -->
    <div class="container mx-auto p-6 flex-grow relative z-10">
        @yield('content')
    </div>

    <div class="relative z-10 mt-auto">
        @include('layouts.partials.web.footer')
    </div>

    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
