<?php

namespace App\Swagger\Routes;

use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/admin/products",
 *     summary="Get list of products (Admin)",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
 *             @OA\Property(property="current_page", type="integer"),
 *             @OA\Property(property="per_page", type="integer")
 *         )
 *     ),
 *     @OA\Response(response=401, description="Unauthenticated"),
 *     @OA\Response(response=403, description="Forbidden")
 * )
 *
 * @OA\Post(
 *     path="/api/admin/products",
 *     summary="Create new product",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"title", "description", "price", "date_available"},
 *             @OA\Property(property="title", type="string", example="New Product"),
 *             @OA\Property(property="description", type="string", example="Product description"),
 *             @OA\Property(property="price", type="number", format="float", example=19.99),
 *             @OA\Property(property="date_available", type="string", format="date", example="2024-12-31")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product created successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(response=422, description="Validation error")
 * )
 *
 * @OA\Get(
 *     path="/api/admin/products/{product}",
 *     summary="Get product by ID (Admin)",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="product",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(response=404, description="Product not found")
 * )
 *
 * @OA\Put(
 *     path="/api/admin/products/{product}",
 *     summary="Update product",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="product",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="title", type="string", example="Updated Product"),
 *             @OA\Property(property="description", type="string", example="Updated description"),
 *             @OA\Property(property="price", type="number", format="float", example=29.99),
 *             @OA\Property(property="date_available", type="string", format="date", example="2025-01-01")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product updated successfully",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(response=404, description="Product not found")
 * )
 *
 * @OA\Delete(
 *     path="/api/admin/products/{product}",
 *     summary="Delete product",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="product",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product deleted successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Product deleted successfully")
 *         )
 *     ),
 *     @OA\Response(response=404, description="Product not found")
 * )
 *
 * @OA\Get(
 *     path="/api/products",
 *     summary="Get list of products (Public/User)",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product")),
 *             @OA\Property(property="current_page", type="integer"),
 *             @OA\Property(property="per_page", type="integer")
 *         )
 *     ),
 *      @OA\Response(response=401, description="Unauthenticated"),
 * )
 *
 * @OA\Get(
 *     path="/api/products/{product}",
 *     summary="Get product by ID (Public/User)",
 *     tags={"Products"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Parameter(
 *         name="product",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="string", format="uuid")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(response=404, description="Product not found")
 * )
 */
class ProductRoutes
{
}
