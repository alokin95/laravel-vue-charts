<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRssesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mac_address_id');
            $table->integer('value');
            $table->timestamps();

            $table->foreign('mac_address_id')->references('id')->on('mac_address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rsses');
    }
}
