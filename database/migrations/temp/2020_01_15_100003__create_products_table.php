<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return voidd
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('price_per_unit');
            $table->unsignedBigInteger('seller_id');
            $table->integer('quantity_small')->nullable();
            $table->integer('quantity_medium')->nullable();
            $table->integer('quantity_large')->nullable();
            $table->integer('quantity_extra_large')->nullable();
            $table->text('description');
            $table->text('product_image');
            $table->string('clothing_type');
            $table->string('gender_type');
            $table->string('category');
            $table->boolean('approved')->default(0);
            $table->timestamps();


            $table->foreign('seller_id')->references('id')->on('seller_info');
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
