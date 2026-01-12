<?php

namespace Plugin\GoogleMaps\App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['location_name', 'latitude', 'longitude'];

    public $table = 'google_maps';

    public static function getCenter(): Location | null
    {

        if ($center = Location::find(\Settings::get('gmaps_center'))) {
            return $center;
        } elseif ($center = Location::first()) {
            return $center;
        }

        return null;
    }
}
