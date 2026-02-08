<?php

namespace App\Services;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Optimized search for products.
     * 
     * @param string|null $query The search keyword
     * @param int $perPage Items per page
     * @return LengthAwarePaginator
     */
    public function search(?string $query, int $perPage = 15): LengthAwarePaginator
    {
        if (empty($query)) {
            return $this->productRepository->getAll($perPage);
        }

        // Potential future optimization: Integrate ElasticSearch or Meilisearch here
        // For now, we use the optimized repository search (Database Index)
        return $this->productRepository->search($query, $perPage);
    }
}
