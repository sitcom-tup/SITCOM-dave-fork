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
            $table->foreignId('company_id')->constrained();
            $table->string('sup_fname');
            $table->string('sup_lname');
            $table->string('sup_position')->nullable();
            $table->string('sup_contact');
            $table->string('sup_email')->unique();
            $table->string('sup_password');
            $table->enum('sup_gender',['male','female','other']);
            $table->string('sup_link')->nullable();
            $table->integer('sup_state')->default(1);
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
