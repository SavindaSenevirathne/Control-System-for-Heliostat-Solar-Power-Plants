@extends ('layouts.layout')

@section('content')
<div>{!! $chart->container() !!}</div>

 {!! $chart->script() !!}
@endsection