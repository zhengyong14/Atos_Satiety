<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaminesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('famines', function (Blueprint $table) {
            $table->id();
            $table->timestamp('acquisition_timestamp');
            $table->string('area');
            $table->integer('week');
            $table->double('NDVI_AGG', 15, 7);
            $table->double('NDWI_AGG', 15, 7);
            $table->double('MOIST_AGG', 15, 7);
            $table->integer('overall_phase');
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
        Schema::dropIfExists('famines');
    }
}
