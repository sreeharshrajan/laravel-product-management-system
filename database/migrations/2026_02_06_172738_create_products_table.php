<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->date('date_available');
            $table->softDeletes();
            $table->timestamps();

            // User relationship
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->nullOnDelete();

            // Indexes for performance
            $table->index('user_id');
            $table->index(['date_available', 'price']);
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
