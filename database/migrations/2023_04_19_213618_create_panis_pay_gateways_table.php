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
        Schema::create('panis_pay_gateways', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');

            $table->string('status' , 5);
            $table->string('message')->nullable();
            $table->string('refID');
            $table->string('authority');
            $table->string('paymentUrl');
            $table->text('PaymentForm');
            $table->string('mask_card_number')->nullable();
            $table->string('BuyerIP')->nullable();

            $table->string('step')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panis_pay_gateways');
    }
};
