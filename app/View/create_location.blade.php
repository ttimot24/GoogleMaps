<form action='{{route('plugin.googlemaps.start.store')}}' method='POST'>
  @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">{{trans('plugin::table.th_location_name')}}</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name='location_name' placeholder="Location name">
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="exampleInputPassword1">{{trans('plugin::table.th_latitude')}}</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name='latitude' placeholder="Latitude">
  </div>
  </div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="exampleInputPassword1">{{trans('plugin::table.th_longitude')}}</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name='longitude' placeholder="Longitude">
  </div>
  </div>  

  <button type="submit" class="btn btn-success btn-block">{{trans('plugin::actions.save')}}</button>

</form>