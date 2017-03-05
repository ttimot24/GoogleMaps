<?php

namespace Plugin\GoogleMaps\App\Controllers;

use Illuminate\Http\Request;
use App\Libs\Controller;

class StartController extends Controller{

	public function index(){

		if(file_exists("plugins/googlemaps/resources/map_styles")){

			$custom_styles = [];

			foreach(array_slice(scandir("plugins/googlemaps/resources/map_styles"),2) as $file){
				$custom_styles[] = basename($file,'.json');
			}

		}



		$this->view->title('Google Maps');
		return $this->view->render("plugin::index",[
				'all_location' => \Plugin\GoogleMaps\App\Model\Location::paginate(10),
				'map_types' => array_merge(['roadmap','satellite','hybrid','terrain'],$custom_styles),
				'animations' => ['NONE','BOUNCE','DROP'],
			]);
	}


	public function createLocation(){

		$location = new \Plugin\GoogleMaps\App\Model\Location();
		$location->location_name = $this->request->input('location_name');
		$location->latitude = $this->request->input('latitude');
		$location->longitude = $this->request->input('longitude');
		$location->active = 1;

		if($location->save()){
            return $this->redirectToSelf()->withMessage(['success' => trans('plugin::messages.successfully_added_location')]);
        }else{
            return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
        }

	}


	public function deleteLocation($id){

		$location = \Plugin\GoogleMaps\App\Model\Location::find($id);

		if($location->delete()){
            return $this->redirectToSelf()->withMessage(['success' => trans('plugin::messages.successfully_deleted_location')]);
        }else{
            return $this->redirectToSelf()->withMessage(['danger' => trans('message.something_went_wrong')]);
        }

	}


	public function saveSettings(){
		foreach($this->request->all() as $key => $value){
            \Settings::where('setting', '=', $key)->update(['value' => $value]);
        }

        return $this->redirectToSelf()->withMessage(['success' => trans('message.successfully_saved_settings')]);
	}



}