<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedDecimal('price', 8, 2);
            $table->unsignedDecimal('discount', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('slug');
            $table->unsignedMediumInteger('stock');
            $table->string('category', 100)->nullable();
            $table->string('subcategory', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
