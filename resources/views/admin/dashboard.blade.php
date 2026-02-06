<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-base-300 min-h-screen font-['Instrument_Sans']">

    <!-- Navbar -->
    <div class="navbar bg-base-100/80 backdrop-blur-md border-b border-white/5 sticky top-0 z-50">
        <div class="flex-1">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost text-xl">
                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-tr from-error to-orange-500 flex items-center justify-center font-bold text-white">
                    A</div>
                AdminPanel
            </a>
        </div>
        <div class="flex-none gap-2">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button"
                    class="btn btn-ghost btn-circle avatar placeholder ring ring-error ring-offset-base-100 ring-offset-2">
                    <div class="bg-neutral text-neutral-content rounded-full w-10">
                        <span class="text-xs">AD</span>
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52 border border-white/5">
                    <li>
                        <div class="pointer-events-none opacity-50 text-xs uppercase tracking-wider mb-1">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </div>
                    </li>
                    <li><a>Settings</a></li>
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
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="stats shadow bg-base-100 border border-white/5">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Users</div>
                    <div class="stat-value text-primary">--</div>
                    <div class="stat-desc">↗︎ 40 (2%)</div>
                </div>
            </div>

            <div class="stats shadow bg-base-100 border border-white/5">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            class="inline-block w-8 h-8 stroke-current">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4">
                            </path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Products</div>
                    <div class="stat-value text-secondary">--</div>
                    <div class="stat-desc">↘︎ 90 (14%)</div>
                </div>
            </div>
        </div>

        <div class="divider my-10"></div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="card bg-base-100 shadow-xl border border-white/5">
                <div class="card-body">
                    <h2 class="card-title">User Management</h2>
                    <p>Manage application users regarding their roles and permissions.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-warning btn-sm">Manage Users</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
