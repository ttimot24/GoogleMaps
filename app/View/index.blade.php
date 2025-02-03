@extends('layout', ['title' => 'GoogleMaps'])

@section('content')

<link rel="stylesheet" type="text/css" href="plugins/GoogleMaps/resources/style.css">

<section class='container'>
  

  <div class='card'>

    <div class='card-body'>
<div class='row'>
 <h1 class="my-4">{{$self->getName()}} <small>v{{$self->getInfo('version','')}}</small></h1><br>
</div>

<div class="row">
<div class='col-8'>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="nav-item active">
      <a class="nav-link" href="#home" aria-controls="home" role="tab" data-bs-toggle="tab">{{trans('plugin::nav.home')}}</a></li>
    <li role="presentation" class="nav-item">
      <a class="nav-link" href="#new_location" aria-controls="nre_location" role="tab" data-bs-toggle="tab">{{trans('plugin::nav.add_location')}}</a>
    </li>
    <li role="presentation" class="nav-item">
      <a class="nav-link"href="#settings" aria-controls="settings" role="tab" data-bs-toggle="tab">{{trans('plugin::nav.settings')}}</a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" href="#docs" aria-controls="docs" role="tab" data-bs-toggle="tab">{{trans('plugin::nav.docs')}}</a>
    </li>
  
  </ul>

  <!-- Tab panes -->
  <div class="tab-content py-3">
    <div role="tabpanel" class="tab-pane active" id="home">@include('plugin::list')</div>
    <div role="tabpanel" class="tab-pane" id="new_location">@include('plugin::create_location')</div>
    <div role="tabpanel" class="tab-pane" id="settings">@include('plugin::settings')</div>
    <div role="tabpanel" class="tab-pane" id="docs">@include('plugin::docs')</div>
  </div>


</div>

<div class='col-4' style='text-align:right;'>
  <div id="map_preview">
      @include('plugin::widget.widget')
  </div>
</div>
</div>

</div>
</div>
 </section>
 @endsection