<x-app-layout>
  <section class="p-5">
    <div class="container text-center">
        <div class="row">
          <div class="col">
            <h1>All Your Meters</h1>
          </div>
          <br> <br>
          <br>
            <h3>
                <x-alert />
            </h3>
        </div>
        <div class="row mb-3">
          <div class="col">
            <a href="{{ route('meters.create') }}" class="btn btn1">Add Meter</a>
          </div>
        </div>
        <div class="row">
          <div class="col">
            @if ($meters->isEmpty()) 
                <div class="alert alert-info" role="alert">
                  You don't have any meters yet.
                </div>
                @else
                <div class="card">
                    <div class="card-body">
                      <div class="table-wrapper-scroll-y table-responsive-sm">
                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Location</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="3">
                                  <div class="table-scroll">
                                    <table class="table table-bordered">
                                      <tbody>
                                        @foreach ($meters as $meter)
                                          <tr>
                                            <td>{{ $meter->name }}</td>
                                            <td>{{ $meter->location }}</td>
                                            <td>
                                              <a href="{{ route('meters.show', $meter->id) }}" class="btn btn-primary btn-rounded btn-fw btn-sm">View</a>
                                              <a href="{{ route('meters.edit', $meter->id) }}" class="btn btn-secondary btn-rounded btn-fw btn-sm">Edit</a>
                                              <form action="{{ route('meters.destroy', $meter->id) }}" method="POST"      class="d-inline">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="btn btn-danger btn-rounded btn-fw btn-sm" onclick="return confirm('Are you sure you want to delete this meter?')">Delete</button>
                                              </form>
                                              <a href="{{ route('measurements.index', ['meter_id' => $meter->id]) }}" class="btn btn1">Add Meter reading</a>
                                            </td>
                                          </tr>
                                        @endforeach
                                      </tbody>
                                    </table>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
                </div>
            @endif
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
