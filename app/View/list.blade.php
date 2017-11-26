<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>{{trans('plugin::table.th_id')}}</th>
        <th>{{trans('plugin::table.th_location_name')}}</th>
        <th>{{trans('plugin::table.th_latitude')}}</th>
        <th>{{trans('plugin::table.th_longitude')}}</th>
        <th><center>{{trans('actions.th_action')}}</center></th>
      </tr>
    </thead>
    <tbody>
    	@foreach($all_location as $location)
		      <tr>
		      	<td>{{ $location->id }} <a href='admin/#' data-toggle='modal' data-target='.mo-{{ $location->id }}'><i class="fa fa-map-marker" id='hidden-center' aria-hidden="true" style='font-size:14px;'></i></a></td>
		        <td>{{ $location->location_name }}</td>
		        <td>{{ $location->latitude }}</td>
		        <td>{{ $location->longitude }}</td>
		        <td>
                <center>
                 <div class="btn-group" role="group">
                     <a type="button" class="btn btn-warning btn-sm" style='min-width:70px;' disabled>{{trans('actions.edit')}}</a>
                     <a type="button" href="{{plugin_link('google-maps/start/delete-location',$location->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                 </div>
                </center>
            </td>
		      </tr> 
      @endforeach

    </tbody>
  </table>

  {{$all_location->links()}}
