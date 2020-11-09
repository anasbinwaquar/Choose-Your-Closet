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
            $table->integer('quantity_small');
            $table->integer('quantity_medium');
            $table->integer('quantity_large');
            $table->integer('quantity_extra_large');
            $table->text('description');
            $table->text('product_image');
            $table->string('sizes');
            $table->string('clothing_type');
            $table->string('gender_type');
            $table->string('category');
            $table->boolean('approved')->default(0);
            $table->boolean('rental');
            $table->timestamps();

            
            // $table->foreign('seller_id')->references('id')->on('seller_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('products');
    }
}
