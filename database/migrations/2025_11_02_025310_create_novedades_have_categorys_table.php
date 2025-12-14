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
        Schema::create('novedades_have_categorys', function (Blueprint $table) {
            $table->foreignId('novedad_fk')->constrained(table:'novedades', column: 'novedad_id');
            $table->unsignedSmallInteger('category_fk');
            $table->foreign('category_fk')->references('category_id')->on('categories');
            
            $table->timestamps();

            $table->primary(['novedad_fk', 'category_fk']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('novedades_have_categorys');
    }
};
