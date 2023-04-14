<x-app-layout>
    <section class="p-5">
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <h1>Edit Meter</h1>
            <br> <br>
            <br>
            <h3>
                <x-alert />
            </h3>
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <a href="{{ route('meters.index') }}" class="btn btn-primary">Back to All Meters</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="card">
              <div class="card-body">
                <form action="{{ route('meters.update', $meter->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                    <label for="name">Meter Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $meter->name }}" required>
                  </div>
                  <div class="form-group mb-3">
                    <label for="location">Location:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ $meter->location }}" required>
                  </div>
                  <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </x-app-layout>
  