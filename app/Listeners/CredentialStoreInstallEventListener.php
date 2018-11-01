<?php

namespace Plugin\GoogleMaps\App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CredentialStoreInstallEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }


    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(\App\Model\Plugin $plugin)
    {
        if($plugin->root_dir=="CredentialStore"){

            if($plugin->active==1){

                try{

                    $token = new \Plugin\CredentialStore\App\Model\TokenCredential();
                    $token->name = "GoogleMaps";
                    $token->secret = \Settings::get('gmaps_api_key');
                    $token->visibility = 1;
                    $token->created_by = \Auth::user()->id;

                    if($token->save()){
                        \Settings::where('setting','gmaps_api_key')->update(['value' => 'credsId:'.$token->id]);
                    }

                }catch(\Illuminate\Database\QueryException $e){
                    $token = \Plugin\CredentialStore\App\Model\TokenCredential::where('name','GoogleMaps')->get()->first();
                
                    $token->secret = \Settings::get('gmaps_api_key');

                    $token->save();
                }
            }else{
                $deactivate = new \Plugin\GoogleMaps\App\Listeners\CredentialStoreDeleteEventListener();
                $deactivate->handle($plugin);
            }

        }
        
    }




}
