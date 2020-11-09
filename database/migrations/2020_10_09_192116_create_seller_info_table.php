<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_info', function (Blueprint $table) {
            $table->id();
            $table->string("First_Name");
            $table->string("Last_Name");
            $table->string("Email");
            $table->string("Phone_Number");
            $table->string("Website_Name");
            $table->string("Brand_Name");
            $table->string("Username")->unique();
            $table->string("Password");
            $table->boolean("Approval")->default(0);
            $table->string("CNIC");
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
        // Schema::dropIfExists('seller_info');
    }
}
