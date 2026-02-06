<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-300 min-h-screen font-['Instrument_Sans']">

    <!-- Navbar -->
    <div class="navbar bg-base-100/80 backdrop-blur-md border-b border-white/5 sticky top-0 z-50">
        <div class="flex-1">
            <a href="{{ route('dashboard') }}" class="btn btn-ghost text-xl">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-tr from-primary to-secondary flex items-center justify-center font-bold text-white">
                    P</div>
                ProductManager
            </a>
        </div>
        <div class="flex-none gap-2">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar placeholder">
                    <div class="bg-neutral text-neutral-content rounded-full w-10">
                        <span class="text-xs">{{ substr(Auth::user()->name ?? 'U', 0, 2) }}</span>
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 border border-white/5">
                    <li>
                        <div class="pointer-events-none opacity-50 text-xs uppercase tracking-wider mb-1">
                            {{ Auth::user()->name ?? 'User' }}
                        </div>
                    </li>
                    <li><a>Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left text-error">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">User Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="card bg-base-100 shadow-xl border border-white/5">
                <div class="card-body">
                    <h2 class="card-title">My Products</h2>
                    <p>View and manage your assigned products.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary btn-sm">View All</button>
                    </div>
                </div>
            </div>
            <!-- More content placeholders -->
        </div>
    </div>

</body>

</html>
