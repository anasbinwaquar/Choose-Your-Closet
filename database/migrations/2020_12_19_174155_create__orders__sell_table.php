<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_sell', function (Blueprint $table) {
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('CustomerID');
            $table->unsignedBigInteger('ProductID');
            $table->string('Size');
            $table->unsignedBigInteger('Quantity');
            $table->string('Delivery_Address');
            $table->unsignedBigInteger('Total');
            $table->DateTime('Date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders_sell');
    }
}
