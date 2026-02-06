<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Product Management') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="bg-base-300 font-['Instrument_Sans'] min-h-screen text-base-content overflow-x-hidden">

    <!-- Navbar -->
    <div
        class="fixed top-0 w-full z-50 transition-all duration-300 backdrop-blur-md bg-base-100/70 border-b border-white/5">
        <div class="container mx-auto px-6 h-16 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-tr from-primary to-secondary flex items-center justify-center font-bold text-white shadow-lg shadow-primary/20">
                    P
                </div>
                <span class="text-xl font-bold tracking-tight">Product<span class="text-primary">Manager</span></span>
            </div>
            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}"
                        class="btn btn-ghost hover:bg-base-content/10 hidden sm:inline-flex">Log in</a>
                    <a href="{{ route('register') }}"
                        class="btn btn-primary bg-gradient-to-r from-primary to-secondary border-none shadow-lg shadow-primary/25 hover:shadow-primary/40">Get
                        Started</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden">
        <!-- Background Orbs -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full z-0 pointer-events-none">
            <div class="absolute top-20 left-10 w-96 h-96 bg-primary/20 rounded-full blur-[100px] animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-[500px] h-[500px] bg-secondary/20 rounded-full blur-[120px] animate-pulse"
                style="animation-delay: 2s"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <div
                class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-base-100 border border-white/10 mb-8 backdrop-blur-sm shadow-sm group cursor-pointer hover:border-primary/50 transition-colors">
                <span class="w-2 h-2 rounded-full bg-success animate-pulse"></span>
                <span class="text-xs font-medium text-base-content/70 group-hover:text-primary transition-colors">v1.0
                    Release Live</span>
            </div>

            <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-8 drop-shadow-sm">
                Master Your Product <br>
                <span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-primary via-secondary to-accent">Lifecycle
                    Today</span>
            </h1>

            <p class="text-lg text-base-content/60 max-w-2xl mx-auto mb-10 leading-relaxed">
                Streamline your inventory, track performance, and manage your catalog with a powerful, secure, and
                intuitive Laravel-based solution.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('register') }}"
                    class="btn btn-primary btn-lg bg-gradient-to-r from-primary to-secondary border-none shadow-xl shadow-primary/30 hover:scale-105 transition-transform w-full sm:w-auto">
                    Start Managing Now
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                <a href="#features" class="btn btn-ghost btn-lg hover:bg-base-content/5 w-full sm:w-auto">
                    Learn More
                </a>
            </div>

            <!-- Dashboard Preview (Mockup) -->
            <div class="mt-20 mx-auto max-w-5xl relative">
                <div class="absolute -inset-1 bg-gradient-to-r from-primary to-secondary rounded-xl blur opacity-30">
                </div>
                <div
                    class="relative bg-base-100 rounded-xl border border-white/10 shadow-2xl overflow-hidden aspect-[16/9] flex items-center justify-center">
                    <div class="absolute inset-0 bg-grid-white/[0.05] bg-[length:32px_32px]"></div>
                    <div class="text-center p-10 relative z-10">
                        <div class="text-6xl mb-4 animate-bounce">📊</div>
                        <h3 class="text-2xl font-bold text-base-content/60">Product Dashboard Preview</h3>
                        <p class="text-sm text-base-content/40 mt-2">Sign in to view your real-time analytics</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div id="features" class="py-24 bg-base-200/50 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold mb-4">Everything you need</h2>
                <p class="text-base-content/60">Powerful features to take your product management to the next level.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="card bg-base-100 hover:shadow-xl hover:shadow-primary/5 transition-all duration-300 border border-white/5 group hover:-translate-y-1">
                    <div class="card-body">
                        <div
                            class="w-12 h-12 rounded-lg bg-primary/10 flex items-center justify-center mb-4 group-hover:bg-primary/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <h3 class="card-title mb-2">Secure Authentication</h3>
                        <p class="text-base-content/70">Role-based access control ensures your data is safe and only
                            accessible to authorized personnel.</p>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div
                    class="card bg-base-100 hover:shadow-xl hover:shadow-secondary/5 transition-all duration-300 border border-white/5 group hover:-translate-y-1">
                    <div class="card-body">
                        <div
                            class="w-12 h-12 rounded-lg bg-secondary/10 flex items-center justify-center mb-4 group-hover:bg-secondary/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <h3 class="card-title mb-2">CRUD Operations</h3>
                        <p class="text-base-content/70">Create, read, update, and delete products with ease using our
                            intuitive and fast interface.</p>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div
                    class="card bg-base-100 hover:shadow-xl hover:shadow-accent/5 transition-all duration-300 border border-white/5 group hover:-translate-y-1">
                    <div class="card-body">
                        <div
                            class="w-12 h-12 rounded-lg bg-accent/10 flex items-center justify-center mb-4 group-hover:bg-accent/20 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <h3 class="card-title mb-2">Advanced Search</h3>
                        <p class="text-base-content/70">Find exactly what you are looking for with our optimized search
                            and filtering capabilities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer p-10 bg-base-300 text-base-content border-t border-white/5">
        <aside>
            <div
                class="w-10 h-10 rounded-lg bg-gradient-to-tr from-primary to-secondary flex items-center justify-center font-bold text-white mb-4 shadow-lg">
                P
            </div>
            <p class="font-bold text-lg">Laravel Product Management</p>
            <p class="opacity-70">Reliable tech since 2024</p>
        </aside>
        <nav>
            <h6 class="footer-title opacity-100">Services</h6>
            <a class="link link-hover hover:text-primary transition-colors">Branding</a>
            <a class="link link-hover hover:text-primary transition-colors">Design</a>
            <a class="link link-hover hover:text-primary transition-colors">Marketing</a>
            <a class="link link-hover hover:text-primary transition-colors">Advertisement</a>
        </nav>
        <nav>
            <h6 class="footer-title opacity-100">Company</h6>
            <a class="link link-hover hover:text-primary transition-colors">About us</a>
            <a class="link link-hover hover:text-primary transition-colors">Contact</a>
            <a class="link link-hover hover:text-primary transition-colors">Jobs</a>
            <a class="link link-hover hover:text-primary transition-colors">Press kit</a>
        </nav>
        <nav>
            <h6 class="footer-title opacity-100">Legal</h6>
            <a class="link link-hover hover:text-primary transition-colors">Terms of use</a>
            <a class="link link-hover hover:text-primary transition-colors">Privacy policy</a>
            <a class="link link-hover hover:text-primary transition-colors">Cookie policy</a>
        </nav>
    </footer>

</body>

</html>
