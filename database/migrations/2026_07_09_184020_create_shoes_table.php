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
       Schema::create('shoes', function (Blueprint $table) {

    $table->id();

    $table->foreignId('category_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->foreignId('brand_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->string('name',100);

    $table->string('slug',100)
          ;

    $table->string('sku',100)
          ->unique();

    $table->text('description')
          ->nullable();

    $table->decimal('price',10,2);

    $table->decimal('discount_price',10,2)
          ->nullable();

    $table->enum('gender',
    [
        'male',
        'female',
        'unisex'
    ]);

    $table->string('image',100)
          ->nullable();

    $table->boolean('status')
          ->default(1);

    $table->timestamps();

});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoes');
    }
};
