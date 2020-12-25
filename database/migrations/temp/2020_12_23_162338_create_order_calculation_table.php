<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderCalculationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_calculation', function (Blueprint $table) {
            $table->id('OrderID');
            $table->unsignedBigInteger('CustomerID');
            $table->unsignedBigInteger('Total_Quantity');
            $table->unsignedBigInteger('Total_Discount');
            $table->unsignedBigInteger('Total_Bill');
            $table->string('Delivery_Address');
            $table->DateTime('OrderDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_calculation');
    }
}
