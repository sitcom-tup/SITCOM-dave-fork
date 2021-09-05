<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('supervisor_id')->constrained();
            $table->foreignId('coordinator_id')->constrained();
            $table->integer('required_hours');
            $table->integer('rendered_hours');
            $table->date('endorsement_date');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->integer('files_id')->nullable();
            $table->boolean('remarks')->nullable();
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
        Schema::dropIfExists('interns');
    }
}
