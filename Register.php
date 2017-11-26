<?php

namespace Plugin\GoogleMaps;

class Register{

	

	public static function routeOptions(){
		return [
				'middleware' => ['web'],
				'namespace' => '\Plugin\GoogleMaps\App',
				//'prefix' => 'gmaps',
		];
	}


	public static function navigation(){
		
		return [
			'googlemaps' => [
								'label' => 'Google Maps',
								#'url' => plugin_link('google-maps'), //Here you can overwrite the default url
								/*'menu' => 'right',
								'submenu_of' => 'shutdown'*/
							 ],
		];

	}

	public static function eventHooks(){

		return [
				'Illuminate\Auth\Events\Login' => [
				//	'\Plugin\GoogleMaps\App\Listeners\ExampleEventListener',
				]
			];

	}
	

	public static function widget(){
		
		

		return view('plugin::widget.widget',[
										'locations' => \Plugin\GoogleMaps\App\Model\Location::all(),
										'api_key' => \Settings::get('gmaps_api_key'),
										'zoom' => \Settings::get('gmaps_zoom'),
										'type' => \Settings::get('gmaps_type'),
										'animation' => \Settings::get('gmaps_animation'),
										]);


		//return "Try mee too!";
	} 


	public static function injectJs(){
		return [];
	}



	public static function onInstall(){

	}


}