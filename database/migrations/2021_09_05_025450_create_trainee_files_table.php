<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraineeFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainee_files', function (Blueprint $table) {
            $table->id();
            $table->string('clearance')->nullable();
            $table->string('enrolment_form')->nullable();
            $table->string('class_card')->nullable();
            $table->string('referral_letter')->nullable();
            $table->string('waiver')->nullable();
            $table->string('sedula_of_student')->nullable();
            $table->string('sedula_of_guardian')->nullable();
            $table->string('endorsemen_letter')->nullable();
            $table->string('memorandum_of_agreement')->nullable();
            $table->string('dwa_dtr')->nullable();
            $table->string('evaluation_form')->nullable();
            $table->string('sit_certificate')->nullable();
            $table->string('written_report')->nullable();
            $table->string('oral_presentation')->nullable();
            $table->string('others')->nullable();
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
        Schema::dropIfExists('trainee_files');
    }
}
