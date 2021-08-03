<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('complaint_id')->constrained('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('lab_id')->nullable()->constrained('labs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('diagnosis_id')->nullable()->constrained('diagnoses');
            $table->unsignedInteger('patient_id');
            $table->text('tests');
            $table->string('medication')->default('continue');
            $table->string('critical')->default('no');
            $table->longText('required_tests')->nullable();
            $table->longText('medication_description')->nullable();
            $table->longText('message');

            $table->index('user_id');
            $table->index('complaint_id');
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
        Schema::dropIfExists('results');
    }
}
