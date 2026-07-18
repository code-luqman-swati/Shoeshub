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
       Schema::create('shoe_variants', function (Blueprint $table) {

    $table->id();


    $table->foreignId('shoe_id')
        ->constrained()
        ->cascadeOnDelete();


    $table->foreignId('size_id')
        ->constrained()
        ->cascadeOnDelete();


    $table->foreignId('color_id')
        ->constrained()
        ->cascadeOnDelete();


    $table->integer('stock')->default(0);


    $table->timestamps();


    // prevent duplicate variants
    $table->unique([
        'shoe_id',
        'size_id',
        'color_id'
    ]);

});

     } /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoe_variants');
    }
};
