<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GoogleMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    private $table_name = 'google_maps';

    public function up()
    {

        if (Schema::hasTable($this->table_name)) {
            return;
        }

        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_name');
            $table->string('latitude');
            $table->string('longitude');
            $table->timestamps();
            $table->integer('active');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table_name);
    }
}
