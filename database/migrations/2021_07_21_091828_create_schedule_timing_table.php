<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTimingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_timing', function (Blueprint $table) {
            $table->bigIncrements('slot_id');
            $table->unsignedBigInteger('mentor_id');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('week_day');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mentor_id')->references('mentor_id')->on('mentor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_timing');
    }
}
