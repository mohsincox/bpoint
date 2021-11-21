<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('painters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('painter_name');
            $table->string('painter_phone_number', 20);
            $table->double('painter_total_point', 8, 2);
            $table->string('painter_address')->nullable();
            $table->string('painter_club_class', 100)->nullable();
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->string('painter_remarks')->nullable();
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
        Schema::drop('painters');
    }
}
