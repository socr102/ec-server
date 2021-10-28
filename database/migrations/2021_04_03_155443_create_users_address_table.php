<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_address', function (Blueprint $table) {
            $table->increments('id_user_address', 11);
            $table->unsignedInteger('user_id')->unsigned()->length(11);;
            $table->string('address_line_1', 100);
            $table->string('address_line_2', 100);
            $table->string('country', 100);
            $table->string('city', 100);
            $table->string('zipcode', 50);
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
        Schema::dropIfExists('users_address');
    }
}
