<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->bigIncrements('review_id');
            $table->unsignedBigInteger('mentor_id');
            $table->unsignedBigInteger('mentee_id');
            $table->string('rating');
            $table->string('review')->nullable();  
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('mentor_id')->references('mentor_id')->on('mentor');
            $table->foreign('mentee_id')->references('mentee_id')->on('mentee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review');
    }
}
