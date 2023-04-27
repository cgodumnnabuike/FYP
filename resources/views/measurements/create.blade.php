<x-app-layout>
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
                                <div class="mb-3">
                                    <label for="measurement_period" class="form-label">Measurement Period</label>
                                    <input type="text" class="form-control" id="measurement_period" name="measurement_period" required>
                                </div>
                                <div class="mb-3">
                                    <label for="timestamp" class="form-label">Timestamp</label>
                                    <input type="datetime-local" class="form-control" id="timestamp" name="timestamp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="consumption_value" class="form-label">Consumption Value</label>
                                    <input type="number" class="form-control" id="consumption_value" name="consumption_value" step="0.01" required>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <button type="submit" class="btn btn1">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>


