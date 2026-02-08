<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(int $perPage = 15): LengthAwarePaginator
    {
        return Product::latest()->paginate($perPage);
    }

    public function search(string $term, int $perPage = 15): LengthAwarePaginator
    {
        return Product::search($term)->paginate($perPage);
    }

    public function findById(string $id): ?Product
    {
        return Product::find($id);
    }

    public function create(array $data): Product
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product;
    }

    public function delete(Product $product): bool
    {
        return $product->delete();
    }
}
