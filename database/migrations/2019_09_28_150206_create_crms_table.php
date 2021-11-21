<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone_number', 50);
            $table->string('agent', 150);
            $table->string('name', 150)->nullable();
            $table->integer('district_id')->unsigned()->nullable();
            $table->string('address')->nullable();
            $table->string('shop_name', 150)->nullable();
            $table->integer('depot_id')->unsigned()->nullable();
            $table->date('transaction_date')->nullable();
            $table->string('product', 500)->nullable();
            $table->string('quantity')->nullable();
            $table->string('caller_type', 100)->nullable();
            $table->string('remarks', 500)->nullable();
            $table->string('camp_in_or_out', 100)->nullable();
            $table->string('call_remarks', 100)->nullable();
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
        Schema::drop('crms');
    }
}
