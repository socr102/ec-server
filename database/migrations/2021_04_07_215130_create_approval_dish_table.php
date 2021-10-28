<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approval_dish', function (Blueprint $table) {
            $table->increments('id_approval_dish', 11);
            $table->integer('dish_id');
            $table->integer('approval_by_user_id')->nullable()->default(NULL);
            $table->timestamp('approval_at')->nullable()->default(NULL);
            $table->string('approval_message')->nullable()->default(NULL);
            $table->tinyInteger('status')->default('0');
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
        Schema::dropIfExists('approval_dish');
    }
}
