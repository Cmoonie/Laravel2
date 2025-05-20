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
        Schema::create('cart', function (Blueprint $table) {
            $table->id();// unique key cart
            $table->foreignId('user_id')->constrained('users');//cart is linked to the user
            $table->foreignId('festival_id')->constrained('festivals');//cart is linked to the festival
            $table->integer('quantity');//number of festival tickets
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};
