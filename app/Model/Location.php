<?php 

namespace Plugin\GoogleMaps\App\Model;

use \Illuminate\Database\Eloquent\Model;

class Location extends Model {

	public $table = 'google_maps';
	
	public static function getCenter(){


		if($center = \Plugin\GoogleMaps\App\Model\Location::find(\Settings::get('gmaps_center'))){
			return $center;
		}else if($center = \Plugin\GoogleMaps\App\Model\Location::first()){
			return $center;
		}

		return NULL;
	}

}