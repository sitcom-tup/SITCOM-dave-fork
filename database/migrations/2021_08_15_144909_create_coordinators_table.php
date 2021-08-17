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
            $table->foreignId('department_id')->constrained();
            $table->string('coor_fname');
            $table->string('coor_lname');
            $table->string('coor_position')->nullable();
            $table->string('coor_contact');
            $table->string('coor_email')->unique();
            $table->string('coor_password');
            $table->enum('coor_gender',['male','female','other']);
            $table->string('coor_link')->nullable();
            $table->integer('coor_state')->default(1);
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
