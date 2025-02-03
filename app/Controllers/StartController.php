<?php

namespace Plugin\GoogleMaps\App\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StartController extends Controller
{

	public function index()
	{

		if (file_exists("plugins/GoogleMaps/resources/map_styles")) {

			$custom_styles = [];

			foreach (array_slice(scandir("plugins/GoogleMaps/resources/map_styles"), 2) as $file) {
				$custom_styles[] = basename($file, '.json');
			}
		}

		$self = new \App\Model\Plugin('GoogleMaps');

		return view("plugin::index", [
			'all_location' => \Plugin\GoogleMaps\App\Model\Location::paginate(10),
			'map_types' => array_merge(['roadmap', 'satellite', 'hybrid', 'terrain'], $custom_styles),
			'animations' => ['NONE', 'BOUNCE', 'DROP'],
			'map_center' => \Plugin\GoogleMaps\App\Model\Location::getCenter(),
			'self' => $self,
			'credential_store' => (new \App\Model\Plugin("CredentialStore"))->isActive() ? \Plugin\CredentialStore\App\Model\TokenCredential::all() : false,
			'locations' => \Plugin\GoogleMaps\App\Model\Location::all(),
			'api_key' => str_contains(\Settings::get('gmaps_api_key'), 'credsId:') && (new \App\Model\Plugin('CredentialStore'))->isActive() ?
				TokenCredential::resolve(\Settings::get('gmaps_api_key'))->token :
				\Settings::get('gmaps_api_key'),
			'zoom' => \Settings::get('gmaps_zoom'),
			'type' => \Settings::get('gmaps_type'),
			'animation' => \Settings::get('gmaps_animation'),
		]);
	}


	public function store(Request $request)
	{

		$location = new \Plugin\GoogleMaps\App\Model\Location($request->all());
		$location->active = 1;

		if ($location->save()) {
			return redirect()->back()->withMessage(['success' => trans('plugin::messages.successfully_added_location')]);
		} else {
			return redirect()->back()->withMessage(['danger' => trans('message.something_went_wrong')]);
		}
	}


	public function destroy($id)
	{

		$location = \Plugin\GoogleMaps\App\Model\Location::find($id);

		if ($location->delete()) {
			return redirect()->back()->withMessage(['success' => trans('plugin::messages.successfully_deleted_location')]);
		} else {
			return redirect()->back()->withMessage(['danger' => trans('message.something_went_wrong')]);
		}
	}



	public function setCenter($location_id)
	{

		if (\Settings::where('setting', 'gmaps_center')->update(['value' => $location_id])) {
			return redirect()->back()->withMessage(['success' => trans('plugin::messages.successfully_set_center')]);
		} else {
			return redirect()->back()->withMessage(['danger' => trans('message.something_went_wrong')]);
		}
	}
}
