<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePainterDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painter_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('depot_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('product_qty_painter', 8, 2);
            $table->double('each_point_painter', 8, 2);
            $table->double('sum_point_painter', 8, 2);
            $table->integer('painter_id')->unsigned();
            $table->integer('dealer_id')->unsigned();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('pd_remarks')->nullable();
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
        Schema::drop('painter_details');
    }
}
