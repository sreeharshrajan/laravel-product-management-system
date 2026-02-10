@foreach ($products as $product)
    <tr class="hover">
        <td class="font-bold">{{ $product->title }}</td>
        <td>${{ number_format($product->price, 2) }}</td>
        <td>
            @if ($product->is_active)
                <div class="badge badge-success badge-soft">Active</div>
            @else
                <div class="badge badge-error badge-soft">Inactive</div>
            @endif
        </td>
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
        <td colspan="5" class="text-center py-8 opacity-50">No products found.</td>
    </tr>
@endif
