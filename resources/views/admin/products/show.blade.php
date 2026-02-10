@extends('layouts.app')

@section('title', $product->title)

@section('content')
    <div class="min-w-xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.products.index') }}" class="btn btn-ghost btn-sm gap-2 pl-0 hover:bg-transparent">
                <i data-lucide="arrow-left" class="w-4 h-4"></i> Back to Products
            </a>
        </div>

        <div class="card bg-base-100/80 backdrop-blur-xl shadow-2xl border border-white/10 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="h-64 md:h-auto bg-base-200 flex items-center justify-center p-8">
                    <i data-lucide="package" class="w-32 h-32 text-primary/50"></i>
                </div>

                <div class="p-8 md:p-10 flex flex-col h-full">
                    <div class="flex-grow">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="badge badge-primary badge-outline font-bold">Product</span>
                            @if ($product->created_at->diffInDays(now()) < 2)
                                <span class="badge badge-secondary font-bold">Recently added</span>
                            @endif
                        </div>

                        <h1 class="text-3xl md:text-4xl font-bold mb-4 tracking-tight">{{ $product->title }}</h1>

                        <div class="prose prose-sm opacity-80 mb-8">
                            <p>{!! $product->description !!}</p>
                        </div>

                        <div class="flex flex-col gap-1 mb-8">
                            <span class="text-sm uppercase tracking-widest opacity-50 font-semibold">Price</span>
                            <div class="text-4xl font-bold text-primary">${{ number_format($product->price, 2) }}</div>
                        </div>

                        <div class="flex flex-col gap-1 mb-6">
                            <span class="text-sm uppercase tracking-widest opacity-50 font-semibold">Available Date</span>
                            <div class="font-semibold flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-primary"></i>
                                {{ $product->date_available->format('l, M d, Y') }}
                            </div>
                        </div>

                        <div class="flex flex-col gap-1 mb-6">
                            <span class="text-sm uppercase tracking-widest opacity-50 font-semibold">Status</span>
                            <div class="font-semibold flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-primary"></i>
                                {{ $product->is_active ? 'Active' : 'Inactive' }}
                            </div>
                        </div>

                        <div class="flex flex-col gap-1 mb-6">
                            <span class="text-sm uppercase tracking-widest opacity-50 font-semibold">Created At</span>
                            <div class="font-semibold flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-primary"></i>
                                {{ $product->created_at->format('l, M d, Y') }}
                            </div>
                        </div>

                        <div class="flex flex-col gap-1 mb-6">
                            <span class="text-sm uppercase tracking-widest opacity-50 font-semibold">Updated At</span>
                            <div class="font-semibold flex items-center gap-2">
                                <i data-lucide="calendar" class="w-4 h-4 text-primary"></i>
                                {{ $product->updated_at->format('l, M d, Y') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
