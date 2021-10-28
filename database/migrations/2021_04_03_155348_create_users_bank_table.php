<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBankTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_bank', function (Blueprint $table) {
            $table->increments('id_user_bank', 11);
            $table->unsignedInteger('user_id')->unsigned()->length(11);
            $table->string('bank_account_name', 100);
            $table->string('account_number', 50);
            $table->string('routing_number', 50);
            $table->string('iban_number', 50);
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
        Schema::dropIfExists('users_bank');
    }
}
