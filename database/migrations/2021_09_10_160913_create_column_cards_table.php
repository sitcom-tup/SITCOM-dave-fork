<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('column_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('column_id')->constrained('board_columns')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('student_id')->nullable();
            $table->foreignId('supervisor_id')->nullable();
            $table->string('card_name');
            $table->string('card_description');
            $table->date('start_date');
            $table->date('due_date');
            $table->integer('status');
            $table->boolean('verified');
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
        Schema::dropIfExists('column_cards');
    }
}
