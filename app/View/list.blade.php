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
		      	<td>{{ $location->id }} 

              @if($location->is($map_center))
                <i class="fa fa-map-marker" aria-hidden="true" style='font-size:16px;'></i>
              @else
                <a href='admin/#' data-toggle='modal' data-target='.mo-{{ $location->id }}'><i class="fa fa-map-marker" id='hidden-center' aria-hidden="true" style='font-size:16px;'></i></a>
              @endif

            </td>
		        <td>{{ $location->location_name }}</td>
		        <td>{{ $location->latitude }}</td>
		        <td>{{ $location->longitude }}</td>
		        <td>
                <center>
                 <div class="btn-group" role="group">
                     <a type="button" class="btn btn-warning btn-sm" style='min-width:70px;' disabled>{{trans('actions.edit')}}</a>
                     <a type="button" href="{{plugin_link('google-maps/start/destroy',$location->id)}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                 </div>
                </center>
            </td>
		      </tr> 


          <div class="modal mo-{{ $location->id }}" id="mo-{{ $location->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header modal-header-warning">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">{{ trans("plugin::common.change_center") }}</h4>
              </div>
              <div class="modal-body">
                {{ trans("plugin::common.are_you_sure_center",["location" => $location->location_name]) }}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('actions.close') }}</button>
                <a href="{{plugin_link('google-maps/start/set-center',$location->id)}}" type="button" class="btn btn-primary">{{ trans('actions.set') }}</a>
              </div>
            </div>
          </div>
        </div>


      @endforeach

    </tbody>
  </table>

  {{$all_location->links()}}
