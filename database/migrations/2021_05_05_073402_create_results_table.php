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
            $table->foreignId('complaint_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('diagnosis_id')->nullable()->constrained();

            $table->string('critical');
            $table->string('medication')->nullable();
            $table->longText('prescription')->nullable();
            $table->longText('message')->nullable();
            $table->date('next_appointment');

            $table->index('diagnosis_id');
            $table->index('complaint_id');
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
