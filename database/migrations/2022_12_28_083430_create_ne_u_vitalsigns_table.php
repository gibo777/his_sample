<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ne_u_vitalsigns', function (Blueprint $table) {
            $table->id();
            $table->string('visit_id',25)->nullable();
            $table->string('temperature_f',25)->nullable();
            $table->string('temperature_c',25)->nullable();
            $table->string('blood_pressure',25)->nullable();
            $table->string('heart_rate',25)->nullable();
            $table->string('respiratory_rate',25)->nullable();
            $table->string('oxygen_saturation',25)->nullable();
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
        Schema::dropIfExists('ne_u_vitalsigns');
    }
};
