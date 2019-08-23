<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarlDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carl_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('quantity');
            $table->integer('discount'); //%int

            //FK carl_id 
            $table->unsignedBigInteger('carl_id');
            $table->foreign('carl_id')->references('id')->on('carls')->onDelete('cascade');

            //FK product
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

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
        Schema::dropIfExists('carl_details');
    }
}
