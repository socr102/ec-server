<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeApproveColumnOnDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // dish
        Schema::table('dish', function (Blueprint $table) {
            $table->dropColumn('approve');
        });
        Schema::table('dish', function (Blueprint $table) {
            $table->enum('approve', ['Pending', 'Accepted', 'Declined', 'Deleted'])->default('Pending')->after('upvote');
            $table->index('approve');
        });

        // approval
        Schema::table('approval_dish', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('approval_dish', function (Blueprint $table) {
            $table->enum('status', ['Pending', 'Accepted', 'Declined', 'Deleted'])->default('Pending')->after('approval_message');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // dish
        Schema::table('dish', function (Blueprint $table) {
            $table->dropColumn('approve');
        });
        Schema::table('dish', function (Blueprint $table) {
            $table->tinyInteger('approve')->default('0')->after('upvote');
            $table->index('approve');
        });

        // approval
        Schema::table('approval_dish', function (Blueprint $table) {
            $table->dropColumn('status');
        });
        Schema::table('approval_dish', function (Blueprint $table) {
            $table->tinyInteger('status')->default('0')->after('approval_message');
            $table->index('status');
        });
    }
}
