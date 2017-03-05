<form action='{{plugin_link("googlemaps/start/save-settings")}}' method='POST'>
  {{csrf_field()}}
  <div class="form-group">
    <label for="gmaps_api_key">API Key</label>
    <input type="text" class="form-control" id="gmaps_api_key" name='gmaps_api_key' placeholder="API key" value="{{ \Settings::get('gmaps_api_key') }}">
  </div>

  <div class="form-group col-md-4">
    <label for="exampleInputPassword1">Zoom</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name='gmaps_zoom' value="{{ \Settings::get('gmaps_zoom') }}" >
  </div>


  <div class="form-group col-md-4">
    <label for="gmap_type">Map type</label>
    <select name='gmaps_type' id="gmap_type" class="form-control" >
    	@foreach($map_types as $type){

          <option value="{{ $type }}" {{ $type==\Settings::get('gmaps_type') ? "selected":"" }} >{{ $type }}</option>

    	 @endforeach
    </select>
  </div>

  <div class="form-group col-md-4">
    <label for="gmap_type">Animation</label>
    <select name='gmaps_animation' id="gmap_type" class="form-control" >
      @foreach($animations as $animation){

          <option value="{{ $animation }}" {{ $animation==\Settings::get('gmaps_animation') ? "selected":"" }} >{{ $animation }}</option>

       @endforeach
    </select>
  </div>

  

  <button type="submit" class="btn btn-success btn-block">{{trans('plugin::actions.save')}}</button>

</form>