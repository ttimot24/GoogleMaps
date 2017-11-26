<div id="map" style="height: 400px;width: 100%;"></div>

    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: {{$zoom}},
          mapTypeId: '{{$type}}',
          @if($map_center)
          center: {lat: {{ $map_center->latitude }}, lng: {{ $map_center->longitude }} }
          @endif
        });

        @if(!in_array($type,['roadmap','satellite','hybrid','terrain'])) 
          map.mapTypes.set('{{$type}}', new google.maps.StyledMapType(JSON.parse('<?= str_replace(PHP_EOL,"",file_get_contents("plugins/GoogleMaps/resources/map_styles/".$type.".json")) ?>')));
        @endif

        @foreach($locations as $location)
        var marker = new google.maps.Marker({
          position: {lat: {{ $location->latitude }}, lng: {{ $location->longitude }} },

          @if($animation!="NONE")
          animation: google.maps.Animation.{{$animation}},
          @endif

          map: map
        });

        @endforeach


      }
    </script>


<script async defer src="https://maps.googleapis.com/maps/api/js?key={{$api_key}}&callback=initMap">
</script>