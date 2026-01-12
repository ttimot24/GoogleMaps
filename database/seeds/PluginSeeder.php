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
            'group' => 'website',
            'setting' => 'gmaps_api_key',
            'value' => '',
        ]);

        DB::table('settings')->insert([
            'group' => 'website',
            'setting' => 'gmaps_zoom',
            'value' => '12',
        ]);

        DB::table('settings')->insert([
            'group' => 'website',
            'setting' => 'gmaps_type',
            'value' => 'roadmap',
        ]);

        DB::table('settings')->insert([
            'group' => 'website',
            'setting' => 'gmaps_center',
            'value' => null,
        ]);

        DB::table('settings')->insert([
            'group' => 'website',
            'setting' => 'gmaps_animation',
            'value' => 'NONE',
        ]);

    }
}
