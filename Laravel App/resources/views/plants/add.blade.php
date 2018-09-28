@extends('layouts.layout')

@section('content')

<div class="box box-solid box-profile" >
  <div class="box-header with-border">
    <h3 class="box-title">Plant Details</h3>
  </div>
<form class="form-horizontal" action="/plants/add" method="POST">
  {{ csrf_field() }}

    <div class="box-body box-profile">
        <div class="form-group">
          <label for="name" class="col-sm-2 control-label">Plant Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="name" placeholder="Plant Name" name="name">
            @if($errors->has('name'))<span class="help-block">{{ $errors->first('name') }}</span>@endif
          </div>
        </div>
        <div class="form-group">
          <label for="location" class="col-sm-2 control-label">Plant Address</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="location" placeholder="Plant Address" name="location">
            @if($errors->has('location'))<span class="help-block">{{ $errors->first('location') }}</span>@endif
          </div>
        </div>
        <div class="form-group">
          <label for="latitude" class="col-sm-2 control-label">Latitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nic" placeholder="Latitude" name="latitude">
            @if($errors->has('latitude'))<span class="help-block">{{ $errors->first('latitude') }}</span>@endif
          </div>
        </div>
        <div class="form-group">
          <label for="longitude" class="col-sm-2 control-label">Longitude</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="longitude" placeholder="Longitude" name="longitude">
            @if($errors->has('contact'))<span class="help-block">{{ $errors->first('contact') }}</span>@endif
          </div>
        </div>
        <button type="submit" class="btn btn-success pull-right">Save</button>
    </div>
</form>
</div>

@endsection