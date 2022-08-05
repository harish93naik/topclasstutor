<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_timings', function (Blueprint $table) {
            $table->bigIncrements('event_booking_id');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('mentee_id');
            $table->unsignedBigInteger('event_id');
            $table->string('meeting_url');
            $table->string('meeting_id');
            $table->string('meeting_uuid');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('mentor_id')->references('mentor_id')->on('mentor');
            $table->foreign('mentee_id')->references('mentee_id')->on('mentee');
            $table->foreign('event_id')->references('event_id')->on('mentor_schedule_timings');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_timings');
    }
}
