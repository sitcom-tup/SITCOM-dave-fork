<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
<<<<<<< HEAD
            $table->foreignId('supervisor_id')->nullable();
            $table->integer('day_of_week');
            $table->time('in_time');
            $table->time('out_time');
            $table->time('in_time_provision');
=======
            $table->foreignId('supervisor_id')->constrained();
            $table->integer('day_of_week');
            $table->time('in_time');
            $table->time('out_time');
>>>>>>> ea01e6c (schedule and time record table | factory not finished yet)
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
        Schema::dropIfExists('schedules');
    }
}
