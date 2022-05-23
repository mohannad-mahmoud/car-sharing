<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rides', function (Blueprint $table) {
            $table->id();

            $table->integer('car_id');
            $table->integer('source_city_id');
            $table->string('location_in_source_city')->nullable();

            $table->integer('enroute_city_id');
            $table->string('location_in_enroute_city')->nullable();
            $table->integer('destination_city_id');
            $table->string('location_in_destination_city')->nullable();
            $table->string('enroute_client_cost')->nullable();
            $table->string('ride_name')->nullable();

            $table->string('number_of_seats')->nullable();
            $table->string('client_cost')->nullable();
            $table->string('allowed_smoking')->nullable();
            $table->string('allowed_animals')->nullable();
            $table->string('allowed_music')->nullable();
            $table->string('allowed_food')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('arrive_date')->nullable();
            $table->string('arrive_time')->nullable();
            $table->string('ride_status')->nullable();


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
        Schema::dropIfExists('rides');
    }
}
