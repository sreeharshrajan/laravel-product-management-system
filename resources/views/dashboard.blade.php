@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <h1 class="text-3xl font-bold mb-2 tracking-tight">Welcome, {{ Auth::user()->name }}</h1>
    <p class="text-sm mb-8">Logged in as <span class="badge badge-primary">{{ Auth::user()->role->name }}</span></p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- My Products -->
        <div
            class="card bg-base-100/80 backdrop-blur-xl shadow-2xl border border-white/10 rounded-2xl hover:border-primary/20 transition-colors duration-300">
            <div class="card-body">
                <h2 class="card-title text-primary mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    My Products
                </h2>
                <p class="opacity-60 text-sm mb-4">View and manage your assigned products.</p>
                <div class="card-actions justify-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">View All</a>
                    <button class="btn btn-secondary btn-sm">Add New</button>
                </div>
            </div>
        </div>

        <!-- Notifications -->
        <div
            class="card bg-base-100/80 backdrop-blur-xl shadow-2xl border border-white/10 rounded-2xl hover:border-primary/20 transition-colors duration-300">
            <div class="card-body">
                <h2 class="card-title text-accent mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    Notifications
                </h2>
                <p class="opacity-60 text-sm mb-4">Check your latest updates and messages.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-accent btn-sm">Read All</button>
                </div>
            </div>
        </div>

        <!-- Help & Support -->
        <div
            class="card bg-base-100/80 backdrop-blur-xl shadow-2xl border border-white/10 rounded-2xl hover:border-primary/20 transition-colors duration-300">
            <div class="card-body">
                <h2 class="card-title text-info mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    Help & Support
                </h2>
                <p class="opacity-60 text-sm mb-4">Need assistance using the platform?</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-info btn-sm">Contact Support</button>
                </div>
            </div>
        </div>
    </div>
@endsection
