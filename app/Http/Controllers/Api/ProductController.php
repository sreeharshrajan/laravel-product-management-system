<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Services\ProductService;
use App\Services\SearchService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Mews\Purifier\Facades\Purifier;

class ProductController extends Controller
{
    protected $productService;
    protected $searchService;

    public function __construct(ProductService $productService, SearchService $searchService)
    {
        $this->productService = $productService;
        $this->searchService = $searchService;
    }

    public function index(Request $request): JsonResponse
    {
        $query = $request->query('search');
        $perPage = $request->query('per_page', 15);

        $products = $this->searchService->search($query, $perPage);

        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['description'] = Purifier::clean($data['description']);

        $product = $this->productService->createProduct($data);

        return response()->json([
            'id' => $product->id,
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, string $id): JsonResponse
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $data = $request->validated();

        if (isset($data['description'])) {
            $data['description'] = Purifier::clean($data['description']);
        }

        $updatedProduct = $this->productService->updateProduct($product, $data);

        return response()->json($updatedProduct);
    }

    public function destroy(string $id): JsonResponse
    {
        $product = $this->productService->getProductById($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $this->productService->deleteProduct($product);

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
