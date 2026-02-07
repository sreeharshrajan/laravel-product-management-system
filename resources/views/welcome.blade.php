<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Management System | Assessment</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-300 font-['Instrument_Sans'] min-h-screen text-base-content antialiased">

    @include('layouts.partials.web.header')

    <main class="relative mt-16 p-20 overflow-hidden">
        <div class="h-16"></div>

        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] bg-primary/10 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] bg-secondary/10 rounded-full blur-[120px]">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <div class="badge badge-outline border-white/10 py-4 px-6 mb-8 gap-2 bg-base-100/50 backdrop-blur-md">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
                    </span>
                    <span class="text-xs font-semibold tracking-wide opacity-80 uppercase">Product Manager</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-bold tracking-tight mb-8">
                    High-Performance <br />
                    <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-white via-white to-white/40">Product
                        System.</span>
                </h1>

                <p class="text-xl text-base-content/60 max-w-2xl mx-auto mb-12 leading-relaxed italic">
                    "A robust Laravel implementation featuring Repository patterns, optimized SQL indexing, and secure
                    CRUD operations."
                </p>
            </div>

            <div class="mt-24 mb-12 max-w-6xl mx-auto">
                <div class="bg-base-100 rounded-2xl border border-white/10 shadow-2xl overflow-hidden shadow-primary/5">
                    <div class="border-b border-white/5 bg-base-200/50 px-6 py-4 flex items-center justify-between">
                        <div class="flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-error/50"></div>
                            <div class="w-3 h-3 rounded-full bg-warning/50"></div>
                            <div class="w-3 h-3 rounded-full bg-success/50"></div>
                        </div>
                        <div class="text-xs font-mono opacity-40 italic font-bold">ProductManager</div>
                    </div>
                    <div class="p-8 grid md:grid-cols-3 gap-6 opacity-80 pointer-events-none select-none">
                        <div class="p-6 rounded-xl bg-base-200 border border-white/5 flex flex-col gap-1">
                            <span class="text-xs font-bold opacity-50 text-uppercase">Total Products</span>
                            <span class="text-3xl font-bold tracking-tight text-primary font-mono">1,284</span>
                        </div>
                        <div class="p-6 rounded-xl bg-base-200 border border-white/5 flex flex-col gap-1">
                            <span class="text-xs font-bold opacity-50 text-uppercase">Query Speed</span>
                            <span class="text-3xl font-bold tracking-tight text-success font-mono">24ms</span>
                        </div>
                        <div class="p-6 rounded-xl bg-base-200 border border-white/5 flex flex-col gap-1">
                            <span class="text-xs font-bold opacity-50 text-uppercase">Total Users</span>
                            <span class="text-3xl font-bold tracking-tight font-mono">10</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>



    <section class="py-24 container mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-8 rounded-2xl bg-base-200/50 border border-white/5">
                <div class="text-primary mb-4 text-2xl">🛡️</div>
                <h4 class="font-bold mb-2">Layered Security</h4>
                <p class="text-sm opacity-60">CSRF protection, XSS filtering, and Bcrypt hashing implemented at the
                    core.</p>
            </div>
            <div class="p-8 rounded-2xl bg-base-200/50 border border-white/5">
                <div class="text-secondary mb-4 text-2xl">⚡</div>
                <h4 class="font-bold mb-2">SQL Optimization</h4>
                <p class="text-sm opacity-60">Database indexing on search columns to handle large-scale product
                    catalogs.</p>
            </div>
            <div class="p-8 rounded-2xl bg-base-200/50 border border-white/5">
                <div class="text-accent mb-4 text-2xl">📝</div>
                <h4 class="font-bold mb-2">Rich Text CRUD</h4>
                <p class="text-sm opacity-60">Full Trix/Quill integration for professional product descriptions.</p>
            </div>
            <div class="p-8 rounded-2xl bg-base-200/50 border border-white/5">
                <div class="text-success mb-4 text-2xl">🐳</div>
                <h4 class="font-bold mb-2">Auto-Deployment</h4>
                <p class="text-sm opacity-60">Dockerized environment for seamless 'Zero-Config' setup and evaluation.
                </p>
            </div>
        </div>
    </section>

    @include('layouts.partials.web.footer')

</body>

</html>
