@extends('layouts.layout')

@section('content')
<div class="row">
<div class="col-md-3"></div>

<div class="col-md-6">
<h3>Profile</h3>

<div class="box box-primary">
<div class="box-body box-profile">
  <img class="profile-user-img img-responsive img-circle" src="{{ Auth::user()->avatar }}" alt="User profile picture">

  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

  

  <ul class="list-group list-group-unbordered">
    <li class="list-group-item">
      <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
    </li>
    <li class="list-group-item">
      <b>NIC</b> <a class="pull-right">{{ Auth::user()->nic }}</a>
    </li>
    <li class="list-group-item">
      <b>Contact Number</b> <a class="pull-right">{{ Auth::user()->contact_no }}</a>
    </li>
    

  </ul>

  <a href="/home/profile/edit" class="btn btn-primary btn-block"><b>Edit</b></a>
</div>
<!-- /.box-body -->
</div>
</div>
<div class="col-md-3"></div>
</div>
@endsection