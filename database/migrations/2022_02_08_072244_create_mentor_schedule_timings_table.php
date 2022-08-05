<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMentorScheduleTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentor_schedule_timings', function (Blueprint $table) {
            $table->bigIncrements('event_id');
            $table->unsignedBigInteger('mentor_id');
            $table->string('title');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->dateTime('start_recur')->nullable();
            $table->dateTime('end_recur')->nullable();
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
        Schema::dropIfExists('mentor_schedule_timings');
    }
}
