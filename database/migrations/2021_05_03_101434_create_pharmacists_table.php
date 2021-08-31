<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pharmacy_id')->constrained('pharmacies')->onDelete('cascade')->onUpdate('cascade');

            $table->string('first_name');
            $table->string('last_name');
            $table->date('birth_date');
            $table->string('gender');
            $table->integer('phone');
            $table->string('status')->default('active');

            $table->index('user_id');
            $table->index('pharmacy_id');
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
        Schema::dropIfExists('pharmacists');
    }
}
