<form action='{{ route('settings.store') }}' method='POST'>
  @csrf


  <div class="form-group col-md-12">
  @if(!$credential_store)
    <label for="gmaps_api_key">API Key</label>
    <input type="text" class="form-control" id="gmaps_api_key" name='gmaps_api_key' placeholder="API key" value="{{ \Settings::get('gmaps_api_key') }}">
 	@else
    <label for="gmaps_api_key">API Key from <a href="{{plugin_link('credential-store')}}">CredentialStore</a></label>
 	  <select name='gmaps_api_key' id="gmaps_api_key" class="form-control" >
        @foreach($credential_store as $credential)

            <option value="{{ $credential->getCredentialLink()}}" {{ $credential->getCredentialLink()==\Settings::get('gmaps_api_key') ? "selected":"" }} >{{ $credential->name }}</option>

         @endforeach
      </select>
      @endif
  </div>


  <div class="form-group col-md-4">
    <label for="exampleInputPassword1">Zoom</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name='gmaps_zoom' value="{{ \Settings::get('gmaps_zoom') }}" >
  </div>


  <div class="form-group col-md-4">
    <label for="gmap_type">Map type</label>
    <select name='gmaps_type' id="gmap_type" class="form-control" >
    	@foreach($map_types as $type)

          <option value="{{ $type }}" {{ $type==\Settings::get('gmaps_type') ? "selected":"" }} >{{ $type }}</option>

    	 @endforeach
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="gmap_type">Animation</label>
    <select name='gmaps_animation' id="gmap_type" class="form-control" >
      @foreach($animations as $animation)

          <option value="{{ $animation }}" {{ $animation==\Settings::get('gmaps_animation') ? "selected":"" }} >{{ $animation }}</option>

       @endforeach
    </select>
  </div>

  

  <button type="submit" class="btn btn-success btn-block">{{trans('plugin::actions.save')}}</button>

</form>