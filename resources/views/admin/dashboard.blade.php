@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-xl mb-8 tracking-tight">Welcome back, <span class="text-primary">{{ Auth::user()->name }}</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="stats shadow-2xl bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
                <div class="stat-title opacity-60 font-bold uppercase tracking-wider text-xs">Total Users</div>
                <div class="stat-value text-primary font-mono tracking-tight">0</div>
            </div>
        </div>

        <div class="stats shadow-2xl bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        class="inline-block w-8 h-8 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <div class="stat-title opacity-60 font-bold uppercase tracking-wider text-xs">Total Products</div>
                <div class="stat-value text-secondary font-mono tracking-tight">0</div>
            </div>
        </div>
    </div>
@endsection
