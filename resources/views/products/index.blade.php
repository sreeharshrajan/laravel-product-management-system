@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="mb-8 w-full flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="flex-1">
            <h1 class="text-4xl font-bold tracking-tight text-white">Products</h1>
            <p class="text-sm opacity-60 mt-1">Showing {{ $products->count() }} products</p>
        </div>

        <form action="{{ route('web.products.index') }}" method="GET" class="">
            <div class="form-control w-full">
                <div
                    class="input input-bordered bg-[#1a1c23] flex items-center gap-2 rounded-xl focus-within:outline-primary">
                    <i data-lucide="search" class="w-4 h-4 opacity-50"></i>
                    <input type="text" name="search" class="grow border-none focus:ring-0"
                        placeholder="Search products..." value="{{ request('search') }}" />
                    @if (request('search'))
                        <a href="{{ route('web.products.index') }}" class="btn btn-ghost btn-xs btn-circle">✕</a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse($products as $product)
            <div
                class="group relative flex flex-col bg-base-100 rounded-3xl transition-all duration-500 hover:shadow-[0_20px_50px_rgba(0,0,0,0.1)] hover:-translate-y-2 overflow-hidden">

                <div
                    class="relative w-full overflow-hidden rounded-2xl bg-gradient-to-br from-base-200 to-base-300 flex items-center justify-center">
                    @if ($product->created_at->diffInDays(now()) < 2)
                        <div class="absolute top-4 left-4">
                            <span class="badge badge-primary">
                                Recently Added
                            </span>
                        </div>
                    @endif
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <div class="flex-grow">
                        <h2
                            class="text-xl font-bold tracking-tight text-base-content group-hover:text-primary transition-colors duration-300">
                            {{ $product->title }}
                        </h2>
                        <p class="mt-2 text-sm text-base-content/60 line-clamp-2 leading-relaxed">
                            {!! $product->description !!}
                        </p>
                    </div>

                    <div class="mt-6 flex items-center justify-between p-4 rounded-2xl bg-base-200/50">
                        <div class="flex flex-col">
                            <span class="text-[10px] font-bold uppercase tracking-tighter opacity-40">Price</span>
                            <span class="text-xl font-black text-base-content">
                                <span class="text-primary text-sm font-bold">$</span>{{ number_format($product->price, 2) }}
                            </span>
                        </div>
                        <div class="h-8 w-[1px] bg-base-content/10"></div>
                        <div class="flex flex-col items-end">
                            <span class="text-[10px] font-bold uppercase tracking-tighter opacity-40">Available</span>
                            <span class="text-xs font-bold">{{ $product->date_available->format('M d, Y') }}</span>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('web.products.show', $product) }}"
                            class="relative group/btn overflow-hidden btn btn-primary border-none w-full rounded-xl shadow-md shadow-primary/20">
                            <span class="relative z-10 flex items-center gap-2">
                                View Details
                                <i data-lucide="arrow-right"
                                    class="w-3 h-3 transition-transform group-hover/btn:translate-x-1"></i>
                            </span>
                            <div
                                class="absolute inset-0 bg-white/20 translate-y-full group-hover/btn:translate-y-0 transition-transform duration-300">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div
                class="col-span-full flex flex-col items-center justify-center py-32 rounded-3xl border-2 border-dashed border-base-content/10">
                <div class="p-6 rounded-full bg-base-200 mb-4">
                    <i data-lucide="package-open" class="w-12 h-12 opacity-20"></i>
                </div>
                <h3 class="text-2xl font-bold opacity-80">No products found</h3>
                <p class="text-base-content/50 max-w-xs text-center mt-2">We couldn't find anything matching your criteria.
                    Check back later!</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
@endsection
