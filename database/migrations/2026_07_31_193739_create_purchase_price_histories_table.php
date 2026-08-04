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
        Schema::create('purchase_price_histories', function (Blueprint $table) {

    $table->id();

    $table->foreignId('shoe_variant_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('purchase_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->decimal('purchase_price',10,2);

    $table->integer('quantity');

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_price_histories');
    }
};
