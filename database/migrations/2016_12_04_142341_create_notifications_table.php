<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("notifications", function($table) {
            $table->increments("id");
            $table->integer("id_khoa")->unsigned();
            $table->string("content");
            $table->integer("status")->default(0);
            $table->foreign("id_khoa")->references("id")->on("khoa");
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
