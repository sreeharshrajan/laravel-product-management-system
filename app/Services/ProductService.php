<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts(int $perPage = 15): LengthAwarePaginator
    {
        return $this->productRepository->getAll($perPage);
    }

    public function searchProducts(string $term, int $perPage = 15): LengthAwarePaginator
    {
        return $this->productRepository->search($term, $perPage);
    }

    public function createProduct(array $data): Product
    {
        // Add any specific business logic here before creation
        return $this->productRepository->create($data);
    }

    public function updateProduct(Product $product, array $data): Product
    {
        // Add any specific business logic here before update
        return $this->productRepository->update($product, $data);
    }

    public function deleteProduct(Product $product): bool
    {
        return $this->productRepository->delete($product);
    }

    public function getProductById(string $id): ?Product
    {
        return $this->productRepository->findById($id);
    }
}
