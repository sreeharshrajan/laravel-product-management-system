@extends('layouts.admin')

@section('title', 'Create Product')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="flex items-center gap-4 mb-6">
            <a href="{{ route('admin.products.index') }}" class="btn btn-ghost btn-circle">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h1 class="text-3xl font-bold">Create Product</h1>
        </div>

        <div class="bg-base-100/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-xl p-8">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf

                <div class="form-control w-full mb-4">
                    <label class="label"><span class="label-text font-semibold">Title</span></label>
                    <input type="text" name="title"
                        class="input input-bordered w-full @error('title') input-error @enderror"
                        value="{{ old('title') }}" placeholder="Product Title" required>
                    @error('title')
                        <span class="text-error text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control w-full mb-4">
                    <label class="label"><span class="label-text font-semibold">Description</span></label>
                    <textarea name="description" class="textarea textarea-bordered h-32 @error('description') textarea-error @enderror"
                        placeholder="Product Description" required>{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-error text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="form-control w-full">
                        <label class="label"><span class="label-text font-semibold">Price ($)</span></label>
                        <input type="number" step="0.01" name="price"
                            class="input input-bordered w-full @error('price') input-error @enderror"
                            value="{{ old('price') }}" placeholder="0.00" required>
                        @error('price')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-control w-full">
                        <label class="label"><span class="label-text font-semibold">Date Available</span></label>
                        <input type="date" name="date_available"
                            class="input input-bordered w-full @error('date_available') input-error @enderror"
                            value="{{ old('date_available') }}" required>
                        @error('date_available')
                            <span class="text-error text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-8">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-ghost">Cancel</a>
                    <button type="submit" class="btn btn-primary">
                        <i data-lucide="save" class="w-4 h-4 mr-2"></i> Create Product
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
