<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_items', function (Blueprint $table) {

            $table->id();
$table->foreignId('purchase_id')
    ->constrained()
    ->cascadeOnDelete();
    

$table->foreignId('shoe_variant_id')
    ->references('id')
    ->on('shoe_variants')
    ->cascadeOnDelete();

            $table->integer('quantity');

            $table->decimal('purchase_price', 10, 2);

            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_items');
    }
};