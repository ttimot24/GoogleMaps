<?php

namespace Plugin\GoogleMaps;


use \Plugin\CredentialStore\App\Model\TokenCredential;

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
				'eloquent.deleting: App\Model\Plugin' => [
					'\Plugin\GoogleMaps\App\Listeners\CredentialStoreDeleteEventListener',
				],
				'eloquent.saving: App\Model\Plugin' => [
					'\Plugin\GoogleMaps\App\Listeners\CredentialStoreInstallEventListener',
				]
			];

	}
	

	public static function widget(){
		
		

		return view('plugin::widget.widget',[
										'locations' => \Plugin\GoogleMaps\App\Model\Location::all(),
										'api_key' => str_contains(\Settings::get('gmaps_api_key'),'credsId:') && (new \App\Model\Plugin('CredentialStore'))->isActive()? 
																TokenCredential::resolve(\Settings::get('gmaps_api_key'))->token: 
																\Settings::get('gmaps_api_key'),
										'zoom' => \Settings::get('gmaps_zoom'),
										'type' => \Settings::get('gmaps_type'),
										'animation' => \Settings::get('gmaps_animation'),
										'map_center' => \Plugin\GoogleMaps\App\Model\Location::getCenter(),
										]);


		//return "Try mee too!";
	} 


	public static function injectJs(){
		return [
			//'main.js'
		];
	}



	public static function onInstall(){

	}


}