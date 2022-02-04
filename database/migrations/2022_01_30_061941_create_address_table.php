<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->unsignedMediumInteger('id')->autoIncrement();
            $table->unsignedMediumInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('address_type',10);
            $table->string('address');
            $table->string('municipality',30);
            $table->string('region',30);
            $table->unsignedMediumInteger('zip_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('address');
    }
}
