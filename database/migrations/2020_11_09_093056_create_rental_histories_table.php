<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('current_owner_id');
            $table->unsignedBigInteger('product_id');
            $table->date('Start_date');
            $table->date('End_date');
            $table->integer('charges');
            $table->integer('extra_charges')->default(0);
            $table->timestamps();

            
            $table->foreign('seller_id')->references('id')->on('seller_info');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('current_owner_id')->references('id')->on('customer_infos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('rental_histories');
    }
}
