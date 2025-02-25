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
        Schema::create('festival', function (Blueprint $table) {
            $table->id(); //Primary key for the festival
            $table->string('name'); // unique festival name
            $table->string('slug'); //after de dash on the url the name
            $table->string('description');//short description of the name of the festival
            $table->string('location');//location festival
            $table->timestamp('scheduled_at');//date of the festival
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('festival');
    }
};
