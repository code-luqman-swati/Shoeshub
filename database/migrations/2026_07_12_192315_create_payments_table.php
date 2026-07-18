<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('payments', function (Blueprint $table) {

        $table->id();


        $table->foreignId('order_id')
              ->constrained()
              ->cascadeOnDelete();


        $table->string('stripe_payment_id',191)
              ->nullable();


        $table->string('payment_method',191)
              ->default('stripe');


        $table->decimal('amount',10,2);


        $table->string('currency',191)
              ->default('USD');


        $table->enum('status',[
            'pending',
            'paid',
            'failed',
            'refunded'
        ])->default('pending');


        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
