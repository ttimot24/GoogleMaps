<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GoogleMapsTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $table_name = 'google_maps';

    public function up()
    {

        if (Schema::hasTable($this->table_name)) { return; }

        Schema::create($this->table_name, function (Blueprint $table) {
            $table->increments('id');
            $table->string('location_name');
            $table->string('latitude');
            $table->string('longitude');
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
