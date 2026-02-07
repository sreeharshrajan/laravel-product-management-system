<nav class="navbar sticky top-0 z-50 backdrop-blur-xl bg-base-300/80 border-b border-white/5">
    <div class="container mx-auto px-6 h-16 flex items-center justify-between">
        <!-- Mobile Dropdown -->
        <div class="flex items-center gap-2 lg:hidden">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-2xl bg-base-200 rounded-box w-52 border border-white/5">
                    <li><a href="{{ route('admin.dashboard') }}"
                            class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
                    <li>
                        <span
                            class="text-xs font-bold opacity-50 uppercase tracking-widest px-2 mt-2 mb-1">Management</span>
                    </li>
                    <li><a>Users</a></li>
                    <li><a>Settings</a></li>
                </ul>
            </div>
        </div>

        <!-- Brand -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-error flex items-center justify-center shadow-lg shadow-error/20">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-error-content" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <div class="flex flex-col hidden sm:flex">
                <span class="text-xl font-bold">Admin<span class="text-error">Panel</span></span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="rounded-lg hover:text-error transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-error/10 text-error font-bold' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <details>
                        <summary class="rounded-lg hover:text-error transition-colors">Management</summary>
                        <ul class="p-2 bg-base-200 w-48 z-[1] border border-white/5 shadow-2xl rounded-xl mt-2">
                            <li><a class="hover:text-error">Users</a></li>
                            <li><a class="hover:text-error">Settings</a></li>
                        </ul>
                    </details>
                </li>
            </ul>
        </div>

        <!-- User Profile -->
        <div class="flex items-center gap-3">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button"
                    class="btn btn-ghost btn-circle avatar placeholder border border-white/10">
                    <div class="bg-neutral text-neutral-content rounded-full w-9">
                        <span class="text-xs font-bold">{{ substr(Auth::user()->name ?? 'A', 0, 1) }}</span>
                    </div>
                </div>
                <ul tabindex="0"
                    class="mt-3 z-[1] p-2 shadow-2xl menu menu-sm dropdown-content bg-base-200 rounded-xl w-56 border border-white/5">
                    <li class="px-4 py-3 border-b border-white/5 mb-2 pointer-events-none">
                        <span class="text-xs opacity-50 uppercase tracking-widest">Administrator</span>
                        <div class="text-sm font-bold text-error">{{ Auth::user()->name }}</div>
                    </li>
                    <li><a href="{{ route('profile.edit') }}">Account Settings</a></li>
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
</nav>
