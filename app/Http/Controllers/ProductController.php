<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\SearchService;

class ProductController extends Controller
{

    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Display a listing of the products for users.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $products = $this->searchService->search($query, 12);
        
        // Ensure pagination links carry the search term
        $products->appends(['search' => $query]);

        return view('products.index', compact('products'));
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
