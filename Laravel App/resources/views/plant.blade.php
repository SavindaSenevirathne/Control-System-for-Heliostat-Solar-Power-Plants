@extends ('layouts.master')

@section ('styles')
	<link href="/css/dashboard.css" rel="stylesheet">
@endsection

@section ('content')
	<h2>{{ "Name: " . $plant->name }}</h2>
	<h3>{{ "Location: " . $plant->location }}</h3>
@endsection