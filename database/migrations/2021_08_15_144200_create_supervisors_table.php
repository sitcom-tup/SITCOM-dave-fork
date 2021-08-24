<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('company_id')->constrained();
            // $table->string('supervisor_fname');
            // $table->string('supervisor_lname');
            $table->string('supervisor_position')->nullable();
            $table->string('supervisor_contact');
            // $table->string('supervisor_email')->unique();
            // $table->string('supervisor_password');
            $table->enum('supervisor_gender',['male','female','other']);
            $table->string('supervisor_link')->nullable();
            // $table->integer('supervisor_state')->default(1);
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
        Schema::dropIfExists('supervisors');
    }
}
