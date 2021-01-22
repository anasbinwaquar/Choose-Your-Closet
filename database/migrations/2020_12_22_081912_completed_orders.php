<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CompletedOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('OrderID');
            $table->unsignedBigInteger('CustomerID');
            $table->unsignedBigInteger('ProductID');
            $table->string('Size');
            $table->unsignedBigInteger('Quantity');
            $table->string('Delivery_Address');
            $table->unsignedBigInteger('Total');
            $table->unsignedBigInteger('Total_Discount');
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
        //
    }
}