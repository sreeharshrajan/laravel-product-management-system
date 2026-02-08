<?php

namespace App\Swagger\Definitions;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Product",
 *     title="Product",
 *     description="Product model",
 *     type="object",
 *     required={"title", "description", "price", "date_available"},
 *     @OA\Property(property="id", type="string", format="uuid", example="996a60f6-9a96-4556-a190-255d61741764"),
 *     @OA\Property(property="user_id", type="string", format="uuid", example="996a60f6-9a96-4556-a190-255d61741765"),
 *     @OA\Property(property="title", type="string", example="Awesome Product"),
 *     @OA\Property(property="description", type="string", example="This is a great product definition."),
 *     @OA\Property(property="price", type="number", format="float", example=99.99),
 *     @OA\Property(property="date_available", type="string", format="date", example="2024-12-31"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2024-06-01T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2024-06-10T12:00:00Z")
 * )
 */
class ProductSchema {}
