<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostapiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postapi', function (Blueprint $table) {
            $table->id();
            $table->string('cand_name');
            $table->string('cid');
            $table->string('cycle');
            $table->string('state');
            $table->string('party');
            $table->string('chamber');
            $table->string('first_elected');
            $table->string('next_election');
            $table->integer('total');
            $table->integer('spent');
            $table->integer('cash_on_hand');
            $table->integer('debt');
            $table->string('origin');
            $table->string('source');

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
        Schema::dropIfExists('postapi');
    }
}
