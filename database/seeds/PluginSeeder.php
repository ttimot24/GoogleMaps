<?php

namespace Plugin\GoogleMaps\Database\Seeds;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PluginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings')->insert([
            'setting' => 'gmaps_api_key',
            'value' => '',
            'more' => '1',
        ]);

        
        DB::table('settings')->insert([
            'setting' => 'gmaps_zoom',
            'value' => '12',
            'more' => '1',
        ]);


        DB::table('settings')->insert([
            'setting' => 'gmaps_type',
            'value' => 'roadmap',
            'more' => '1',
        ]);

        DB::table('settings')->insert([
            'setting' => 'gmaps_animation',
            'value' => 'NONE',
            'more' => '1',
        ]);



    }
}