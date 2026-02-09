<?php

namespace App\Repositories\Interfaces;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ProductRepositoryInterface
{
    public function getAll(int $perPage = 15, bool $activeOnly = false): LengthAwarePaginator;
    public function search(string $term, int $perPage = 15, bool $activeOnly = false): LengthAwarePaginator;
    public function findById(string $id): ?Product;
    public function create(array $data): Product;
    public function update(Product $product, array $data): Product;
    public function delete(Product $product): bool;
}
