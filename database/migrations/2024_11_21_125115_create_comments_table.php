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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->string('correo', 100);
            $table->string('apodo', 40);
            $table->text('texto');
            $table->timestamps();
            $table->foreign('post_id')->references('id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
