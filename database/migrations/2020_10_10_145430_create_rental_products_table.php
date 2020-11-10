<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_products', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->integer('charges');
            $table->integer('quantitiy_small');
            $table->integer('quantitiy_medium');
            $table->integer('quantitiy_large');
            $table->integer('quantitiy_extra_large');

            //foreign key constraints
            //$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('rental_products');
    }
}
