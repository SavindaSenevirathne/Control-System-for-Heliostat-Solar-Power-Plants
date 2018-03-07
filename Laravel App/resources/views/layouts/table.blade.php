<h2>Power Plants</h2>
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Location</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($plants as $plant)
      <tr>
        <td>{{ $plant->id }}</td>
        <td><a href="/plants/{{ $plant->id }}">{{ $plant->name }}</a></td>
        <td>{{ $plant->location }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>