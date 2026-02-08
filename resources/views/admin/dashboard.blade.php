@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-xl mb-2 tracking-tight">Welcome back, <span class="text-primary">{{ Auth::user()->name }}</span>
    </h1>
    <p class="text-sm mb-8">Logged in as <span class="badge badge-primary">{{ Auth::user()->role->name }}</span></p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="stats shadow-2xl bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden">
            <div class="stat">
                <div class="stat-figure text-primary">
                    <i data-lucide="users" class="inline-block w-8 h-8 stroke-current"></i>
                </div>
                <div class="stat-title opacity-60 font-bold uppercase tracking-wider text-xs">Total Users</div>
                <div class="stat-value text-primary font-mono tracking-tight">{{ $totalUsers }}</div>
            </div>
        </div>

        <div class="stats shadow-2xl bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl overflow-hidden">
            <div class="stat">
                <div class="stat-figure text-secondary">
                    <i data-lucide="package" class="inline-block w-8 h-8 stroke-current"></i>
                </div>
                <div class="stat-title opacity-60 font-bold uppercase tracking-wider text-xs">Total Products</div>
                <div class="stat-value text-secondary font-mono tracking-tight">{{ $totalProducts }}</div>
            </div>
        </div>
    </div>
@endsection
