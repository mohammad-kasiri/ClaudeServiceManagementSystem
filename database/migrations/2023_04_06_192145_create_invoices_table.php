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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');

            $table->unsignedBigInteger('period_id');
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('cascade');

            $table->unsignedBigInteger('traffic_id')->nullable();
            $table->foreign('traffic_id')->references('id')->on('traffic')->onDelete('cascade');

            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');

            $table->integer('quantity');
            $table->unsignedBigInteger('plan_price');
            $table->unsignedBigInteger('plan_rrp_price');
            $table->unsignedBigInteger('discount_code_price')->default(0);
            $table->unsignedBigInteger('payable_price');
            $table->string('status')->default('awaiting'); // awaiting, creating , uncompleted , completed
            $table->string('type');    //new_purchase , extension
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
