@extends ('layouts.layout')

@section ('styles')
        <link href="/css/dashboard.css" rel="stylesheet">        
@endsection

@section ('content')

	<div class="pull-right">
		<a href="/plants/add" class="btn btn-primary btn-block"><b>Add New Plant</b></a>
	</div>
	
	<h2>Power Plants</h2>
	<div class="row">
	   @foreach ($plants as $plant)
		  <div class="col-md-4">
		      <div class="card mb-4 box-shadow">
		        <img class="card-img-top" src="img/heli1.jpg" alt="Card image cap">
		        <div class="card-body">
		          <h4>{{ $plant->name }}</h4>
		          <p class="card-text">Brief summary goes here</p>
		          <table class="table table-striped table-sm">
		            <tr>
		              <td>Temperature</td>
		              <td align="right">0</td>
		            </tr>
		            <tr>
		              <td>Power</td>
		              <td align="right">0</td>
		            </tr>
		          </table>
		          <div class="d-flex justify-content-between align-items-center">
		            <div class="btn-group">
		              <a href="/plants/{{ $plant->id }}"><button type="button" class="btn btn-sm btn-outline-secondary">Details</button></a>
		            </div>
		            <small class="text-muted">Location - {{ $plant->location }}</small>
		          </div>
		        </div>
		      </div>
		  </div>
	   @endforeach
	</div>




@endsection