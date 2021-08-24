<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            // $table->string('student_fname');
            // $table->string('student_lname')->default('TUPT-XX-XXXX');
            $table->string('student_tup_id')->default('TUPT-XX-XXXX');
            $table->foreignId('course_id')->constrained('courses');
            // $table->string('student_email')->unique();
            // $table->string('student_password');
            $table->enum('student_gender', ['male', 'female', 'other']);
            $table->string('student_address');
            $table->string('student_contact');
            $table->string('student_birthday')->nullable();
            $table->string('student_link')->default('/avatar.jpg')->nullable();
            // $table->timestamp('student_email_verified_at')->nullable();
            // $table->integer('student_state')->default('1');
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
