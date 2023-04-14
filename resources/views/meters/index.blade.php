<x-app-layout>
  <section class="p-5">
    <div class="container text-center">
      <div class="row">
        <div class="col">
          <h1>All Your Meters</h1>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
          <a href="{{ route('meters.create') }}" class="btn btn-primary">Add Meter</a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <div class="table-wrapper-scroll-y table-responsive">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Location</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($meters as $meter)
                      <tr>
                        <td>{{ $meter->name }}</td>
                        <td>{{ $meter->location }}</td>
                        <td>
                          <a href="{{ route('meters.show', $meter->id) }}" class="btn btn-primary btn-rounded btn-fw btn-sm">View</a>
                          <a href="{{ route('meters.edit', $meter->id) }}" class="btn btn-secondary btn-rounded btn-fw btn-sm">Edit</a>
                          <form action="{{ route('meters.destroy', $meter->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-rounded btn-fw btn-sm" onclick="return confirm('Are you sure you want to delete this meter?')">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-app-layout>
