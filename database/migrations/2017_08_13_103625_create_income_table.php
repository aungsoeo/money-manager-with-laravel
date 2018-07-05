<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('income_name');
            $table->integer('in_amount');
            $table->string('outcome_name');
            $table->integer('out_amount');
            $table->string('save_name');
            $table->integer('sav_amount');
            $table->date('income_date');
            $table->timestamps();
        });
         Schema::table('income', function($table) {
       $table->foreign('user_id')->references('id')->on('users');
   });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income');
    }
}
