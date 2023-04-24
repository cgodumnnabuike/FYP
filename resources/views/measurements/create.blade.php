<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Add Meter Reading</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                          <form method="POST" action="{{ route('measurements.store') }}">
                            @csrf
                                <label for="measurement_period">Measurement Period</label>
                                <input type="text" class="form-control" id="measurement_period" name="measurement_period" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="timestamp">Timestamp</label>
                                <input type="datetime-local" class="form-control" id="timestamp" name="timestamp" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="consumption_value">Consumption Value</label>
                                <input type="number" class="form-control" id="consumption_value" name="consumption_value" step="0.01" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

</x-app-layout>


