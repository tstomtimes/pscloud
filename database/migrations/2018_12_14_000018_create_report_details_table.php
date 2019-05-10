<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('report_id')->nullable();
            $table->integer('place_id')->nullable();
            $table->integer('member_id')->nullable();
            $table->date('date')->nullable();
            $table->boolean('is_working')->nullable();
            $table->integer('key_number')->nullable();
            $table->integer('make_floors')->nullable();
            $table->integer('make_total')->nullable();
            $table->string('tag')->nullable();
            $table->text('note')->nullable();
            $table->time('start')->nullable();;
            $table->time('finish')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_details');
    }
}
