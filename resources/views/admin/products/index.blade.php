@extends('layouts.admin')

@section('title', 'Products')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
            <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Create Product
        </a>
    </div>

    @if (session('success'))
        <div role="alert" class="alert alert-success mb-6">
            <i data-lucide="check-circle" class="w-6 h-6"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <div class="overflow-x-auto bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl">
        <table class="table w-full">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Date Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="hover">
                        <td class="font-bold">{{ $product->title }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->date_available->format('M d, Y') }}</td>
                        <td class="flex gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-info btn-outline">
                                <i data-lucide="edit-2" class="w-4 h-4"></i> Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-error btn-outline">
                                    <i data-lucide="trash-2" class="w-4 h-4"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if ($products->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-8 opacity-50">No products found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
