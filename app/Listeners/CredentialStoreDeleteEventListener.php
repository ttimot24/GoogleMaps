<?php

namespace Plugin\GoogleMaps\App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CredentialStoreDeleteEventListener
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
        if($plugin->root_dir=="CredentialStore" && str_contains(\Settings::get('gmaps_api_key'),'credsId:')){
            $value = (\Plugin\CredentialStore\App\Model\TokenCredential::resolve(\Settings::get('gmaps_api_key')))->token;

            \Settings::where('setting', '=', 'gmaps_api_key')->update(['value' => $value]);
        }
        
    }


}
