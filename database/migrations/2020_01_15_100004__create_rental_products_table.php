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
            $table->id();
            $table->string('product_name');
            $table->unsignedBigInteger('seller_id');
            $table->text('description');
            $table->text('product_image');
            $table->string('clothing_type');
            $table->string('gender_type');
            $table->string('size');
            $table->string('category');
            $table->boolean('approved')->default(0);
            $table->integer('charges');
            $table->integer('security_deposit');
            $table->boolean('available');

            //foreign key constraints
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
