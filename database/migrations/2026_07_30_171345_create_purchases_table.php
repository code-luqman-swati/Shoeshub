<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

$table->unsignedBigInteger('supplier_id')->nullable();
$table->foreign('supplier_id')->references('id')->on('suppliers')->nullOnDelete();

            $table->string('purchase_no',100)->unique();

            $table->date('purchase_date');

            $table->decimal('total_amount', 10, 2)->default(0);

            $table->enum('status', [
                'pending',
                'completed',
                'cancelled'
            ])->default('completed');

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};