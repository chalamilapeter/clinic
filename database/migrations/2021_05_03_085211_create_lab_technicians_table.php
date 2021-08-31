<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTechniciansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_technicians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('lab_id')->constrained('labs')->onUpdate('cascade')->onDelete('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->integer('phone');
            $table->string('status')->default('active');

            $table->index('user_id');
            $table->index('lab_id');
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
        Schema::dropIfExists('lab_technicians');
    }
}
