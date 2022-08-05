<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoomMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zoom_meeting', function (Blueprint $table) {
           $table->unsignedBigInteger('meeting_id')->primary();
           $table->unsignedBigInteger('booking_id');
           $table->dateTime('start_time');
           $table->dateTime('end_time');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('booking_id')->references('booking_id')->on('booking');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zoom_meeting');
    }
}
