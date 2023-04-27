<x-app-layout>
  <section class="p-5">
      <div class="container text-center">
          <div class="row">
              <div class="col">
                  <h1>Measurement List</h1>
              </div>
          </div>
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <div class="card">
                      <div class="card-body">
                          @if ($measurements->isEmpty())
                              <p>No measurements found.</p>
                          @else
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Measurement Period</th>
                                          <th>Timestamp</th>
                                          <th>Consumption Value</th>
                                          <th>Location</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($measurements as $measurement)
                                          <tr>
                                              <td>{{ $measurement->measurement_period }}</td>
                                              <td>{{ $measurement->timestamp }}</td>
                                              <td>{{ $measurement->consumption_value }}</td>
                                              <td>{{ $measurement->location }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</x-app-layout>

