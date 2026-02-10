<nav class="navbar sticky top-0 z-50 backdrop-blur-xl bg-base-300/80 border-b border-white/5">
    <div class="container mx-auto px-6 h-16 flex items-center justify-between">
        <!-- Mobile Dropdown -->
        <div class="flex items-center gap-2 lg:hidden">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <i data-lucide="menu" class="h-5 w-5"></i>
                </div>
                <ul tabindex="0"
                    class="menu menu-sm dropdown-content mt-3 z-[999] p-2 shadow-2xl bg-base-200 rounded-box w-52 border border-white/5 bg-base-300">
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
            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shadow-lg shadow-primary/20">
                <i data-lucide="box" class="h-6 w-6 text-primary-content"></i>
            </div>
            <div class="flex flex-col hidden sm:flex">
                <span class="text-lg font-bold leading-none tracking-tight">Product<span
                        class="text-primary">Manager</span></span>
                <span class="text-[10px] uppercase tracking-widest opacity-50 font-semibold">Admin Panel</span>
            </div>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="rounded-lg hover:text-primary transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-primary/10 text-primary font-bold' : '' }}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index') }}"
                        class="rounded-lg hover:text-primary transition-colors {{ request()->routeIs('admin.users.index') ? 'bg-primary/10 text-primary font-bold' : '' }}">
                        Users
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.products.index') }}"
                        class="rounded-lg hover:text-primary transition-colors {{ request()->routeIs('admin.products.index') ? 'bg-primary/10 text-primary font-bold' : '' }}">
                        Products
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex justify-between flex-row">
            <!-- Theme Toggle -->
            <button id="theme-toggle" class="btn btn-ghost btn-circle" title="Toggle theme">
                <i id="theme-icon-light" data-lucide="sun" class="h-5 w-5 hidden"></i>
                <i id="theme-icon-dark" data-lucide="moon" class="h-5 w-5"></i>
            </button>

            <!-- User Profile -->
            <div class="flex items-center gap-3">
                @auth
                    <div class="dropdown dropdown-end pointer-events-auto">
                        <div tabindex="0" role="button"
                            class="btn btn-ghost btn-circle avatar placeholder border border-white/10">
                            <div class="bg-neutral text-neutral-content rounded-full">
                                <span
                                    class="text-lg font-bold text-white">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                            </div>
                        </div>
                        <ul tabindex="0"
                            class="mt-2 z-[1] p-2 shadow-2xl menu menu-sm dropdown-content bg-base-200 rounded-xl w-64 border border-white/5">
                            <li class="py-2 border-b border-white/5">
                                <div class="text-sm font-bold text-primary">{{ Auth::user()->name }}</div>
                                <div class="text-xs opacity-50 tracking-widest hover:text-primary">
                                    {{ Auth::user()->email }}
                                </div>
                            </li>
                            <li>
                                <a href="#" onclick="event.preventDefault(); this.nextElementSibling.submit();"
                                    class="text-primary hover:bg-primary/10 hover:text-primary font-bold">Logout</a>
                                <form method="POST" action="{{ route('logout') }}" class="hidden">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn btn-ghost btn-sm font-semibold">Sign In</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
