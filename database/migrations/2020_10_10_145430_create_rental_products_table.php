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
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('current_owner_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamp('Start_date');
            $table->date('End_date');
            $table->string('Brand_Name');
            $table->integer('charges');

            //foreign key constraints
            $table->foreign('seller_id')->references('id')->on('seller_info');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('current_owner_id')->references('id')->on('customer_infos');
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
