<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depot_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('product_qty_dealer', 8, 2);
            $table->double('each_point_dealer', 8, 2);
            $table->double('sum_point_dealer', 8, 2);
            $table->integer('dealer_id')->unsigned();
            $table->integer('painter_id')->unsigned();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('dd_remarks')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->integer('deleted_by')->unsigned()->nullable();
            $table->timestamp('deleted_at')->nullable();
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
        Schema::drop('dealer_details');
    }
}
