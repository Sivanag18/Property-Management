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
        Schema::create('property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('property_name', 50);
            $table->string('address', 100);
            $table->string('price', 100);
            $table->string('type', 10);
            $table->string('offer', 10);
            $table->string('image_01', 255);
            $table->string('image_02', 255)->nullable();
            $table->text('description');
            
            $table->integer('bedroom')->default(0);  
            $table->integer('bathroom')->default(0); 
            $table->integer('balcony')->default(0);  
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('property');
    }
};
