@extends('layout')

@section('content')

<link rel="stylesheet" type="text/css" href="plugins/GoogleMaps/resources/style.css">

<section class='container'>

<div class='row'>
<h1>{{$self->getName()}} <small>v{{$self->getInfo('version','')}}</small></h1><br>
</div>


<div class='col-md-8'>

  <!-- Nav tabs -->
  <div class='well'>
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{trans('plugin::nav.home')}}</a></li>
    <li role="presentation"><a href="#new_location" aria-controls="nre_location" role="tab" data-toggle="tab">{{trans('plugin::nav.add_location')}}</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">{{trans('plugin::nav.settings')}}</a></li>

    <li role="presentation" class="pull-right"><a href="#docs" aria-controls="docs" role="tab" data-toggle="tab">{{trans('plugin::nav.docs')}}</a></li>
  
  </ul>
  </div>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">@include('plugin::list')</div>
    <div role="tabpanel" class="tab-pane" id="new_location">@include('plugin::create_location')</div>
    <div role="tabpanel" class="tab-pane" id="settings">@include('plugin::settings')</div>
    <div role="tabpanel" class="tab-pane" id="docs">@include('plugin::docs')</div>
  </div>


</div>

<div class='col-md-4' style='text-align:right;'>
  <div id="map_preview">
      @include('plugin::widget.widget')
  </div>
</div>


 </section>
 @endsection