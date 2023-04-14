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
        Schema::create('servers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->string('description',300)->nullable();

            $table->string('address',30);
            $table->integer('port');

            $table->enum('protocol', ['http' , 'https'])->default('http');

            $table->string('user',30);
            $table->string('pass',30);

            $table->integer('min_port');
            $table->integer('max_port');

            $table->boolean('is_active')->default(true);

            $table->integer('priority')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
