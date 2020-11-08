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
            $table->string('product_name');
            $table->integer('price_per_unit');
            $table->integer('seller_id');
            $table->integer('quantitiy');
            $table->string('description');
            $table->string('product_image');
            $table->string('sizes');
            $table->string('wear_type');
            $table->string('gender_type');
            $table->string('category');
            $table->boolean('approved');
            $table->boolean('rental');
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
