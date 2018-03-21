@extends ('layouts.master')

@section ('styles')
	<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section ('content')
	<h2>{{ "Name: " . $plant->name }}</h2>
	<h3>{{ "Location: " . $plant->location }}</h3>
	<div class="row">
		{{-- <p>Date : </p> --}}
		<div class="col-md-9" style="margin-top:20px">
	         <div id="temp-chart" style="height: 300px"></div>
	    </div>
    </div>
@endsection

   {!! \Lava::render('LineChart', 'MyStocks', 'temp-chart') !!}