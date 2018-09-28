@extends ('layouts.master')

@section ('header')

@section ('content')

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

    @include ('layouts.header')

    @include ('layouts.sidebar')

    @include ('layouts.table')

  </main>

  @include ('layouts.graph')

@endsection

@section ('footer')

@endsection