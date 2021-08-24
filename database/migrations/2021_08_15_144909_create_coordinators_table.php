<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoordinatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coordinators', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('department_id')->constrained();
            // $table->string('coordinator_fname');
            // $table->string('coordinator_lname');
            $table->string('coordinator_position')->nullable();
            $table->string('coordinator_contact');
            // $table->string('coordinator_email')->unique();
            // $table->string('coordinator_password');
            $table->enum('coordinator_gender',['male','female','other']);
            $table->string('coordinator_link')->nullable();
            // $table->integer('coordinator_state')->default(1);
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
        Schema::dropIfExists('coordinators');
    }
}
