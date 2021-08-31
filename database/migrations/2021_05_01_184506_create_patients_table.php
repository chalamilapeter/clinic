<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('disease_id')->constrained('diseases')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('doctor_id')->unsigned();
            $table->date('appointment_date');
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->integer('phone');
            $table->string('address');
            $table->string('status')->default('active');

            $table->index('user_id');
            $table->index('disease_id');
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
        Schema::dropIfExists('patients');
    }
}
