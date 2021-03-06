<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoautorTrabalho extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coautor_trabalho', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('coautor_id');
            $table->foreign('coautor_id')->references('id')->on('coautors');
            $table->unsignedBigInteger('trabalho_id');
            $table->foreign('trabalho_id')->references('id')->on('trabalhos');
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
        Schema::dropIfExists('coautor_trabalho');
    }
}
