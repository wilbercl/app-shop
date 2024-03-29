<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carls', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->date('order_date')->nullable();
            $table->date('arrived_date')->nullable();
            $table->string('status'); //Active, Pending, Approved, Cancelled, Finished

            //user_id FK
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('carls');
    }
}
