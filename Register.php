<?php

namespace Plugin\GoogleMaps;

use \App\Libs\PluginInterface;
use \Plugin\CredentialStore\App\Model\TokenCredential;

class Register implements PluginInterface
{


	public function webRouteOptions(): array
	{
		return [
			'middleware' => ['web'],
			'namespace' => '\Plugin\GoogleMaps\App',
			//'prefix' => 'gmaps',
		];
	}


	public function apiRouteOptions(): array
	{
		return [
			'middleware' => ['api'],
			'namespace' => '\Plugin\SzamlazzHu\App',
			'prefix' => 'szamlazz-hu',
		];
	}




	public function navigation(): array
	{

		return [
			'googlemaps' => [
				'label' => 'Google Maps',
				#'url' => plugin_link('google-maps'), //Here you can overwrite the default url
				/*'menu' => 'right',
								'submenu_of' => 'shutdown'*/
			],
		];
	}

	public function eventHooks(): array
	{

		return [

		];
	}


	public function widget(): string
	{

		return view('googlemaps::widget.widget', [
			'locations' => \Plugin\GoogleMaps\App\Model\Location::all(),
			'api_key' => \Settings::get('gmaps_api_key'),
			'zoom' => \Settings::get('gmaps_zoom'),
			'type' => \Settings::get('gmaps_type'),
			'animation' => \Settings::get('gmaps_animation'),
			'map_center' => \Plugin\GoogleMaps\App\Model\Location::getCenter(),
		])->render();


		//return "Try mee too!";
	}


	public function injectAdminJs(): array
	{
		return [
			//'main.js'
		];
	}

	public function injectWebsiteJs(): array
	{
		return [
			//'main.js'
		];
	}


	public function onInstall(): void
	{
	}

	public function addProviders(): array
	{
		return [];
	}

	public function addMiddlewares(): array
	{
		return [];
	}

	public function addAliases(): array
	{
		return [];
	}

	public function cliCommands(): array
	{
		return [];
	}
}
