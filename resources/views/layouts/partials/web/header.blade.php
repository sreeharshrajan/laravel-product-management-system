<nav class="navbar sticky top-0 z-50 backdrop-blur-xl bg-base-300/80 border-b border-white/5">
    <div class="container mx-auto px-6 h-16 flex items-center justify-between">

        <div class="flex items-center gap-2">
            @if (Auth::check() && !Auth::user()->isAdmin())
                <div class="dropdown lg:hidden">
                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow-2xl bg-base-200 rounded-box w-52 border border-white/5">
                        <li><a href="{{ route('dashboard') }}" class="active:bg-primary">Dashboard</a></li>
                        <li><a href="{{ route('products.index') }}">Products</a></li>
                    </ul>
                </div>
            @endif

            <a href="/" class="flex items-center gap-3">
                <div
                    class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center shadow-lg shadow-primary/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-content" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div class="flex flex-col hidden sm:flex">
                    <span class="text-lg font-bold leading-none tracking-tight">Product<span
                            class="text-primary">Manager</span></span>
                    <span class="text-[10px] uppercase tracking-widest opacity-50 font-semibold">Enterprise Core</span>
                </div>
            </a>
        </div>

        <div class="hidden lg:flex">
            <ul class="menu menu-horizontal px-1 gap-2">
                @if (Auth::check() && !Auth::user()->isAdmin())
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="rounded-lg hover:text-primary transition-colors {{ request()->routeIs('dashboard') ? 'bg-primary/10 text-primary font-bold' : '' }}">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}"
                            class="rounded-lg hover:text-primary transition-colors {{ request()->routeIs('products.*') ? 'bg-primary/10 text-primary font-bold' : '' }}">
                            Products
                        </a>
                    </li>
                @endif
            </ul>
        </div>

        <div class="flex items-center gap-3">
            @if (Auth::check() && !Auth::user()->isAdmin())
                <div class="dropdown dropdown-end">
                    <div tabindex="0" role="button"
                        class="btn btn-ghost btn-circle avatar placeholder border border-white/10">
                        <div class="bg-neutral text-neutral-content rounded-full w-9">
                            <span class="text-xs font-bold">{{ substr(Auth::user()->name ?? 'U', 0, 1) }}</span>
                        </div>
                    </div>
                    <ul tabindex="0"
                        class="mt-3 z-[1] p-2 shadow-2xl menu menu-sm dropdown-content bg-base-200 rounded-xl w-56 border border-white/5">
                        <li class="px-4 py-3 border-b border-white/5 mb-2 pointer-events-none">
                            <div class="text-sm font-bold text-primary">{{ Auth::user()->name }}</div>
                        </li>
                        <li><a href="#">Account Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full text-left text-error">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm font-semibold">Sign In</a>
            @endif
        </div>
    </div>
</nav>
