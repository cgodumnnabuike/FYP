<x-app-layout>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Edit Measurement</h1>
                </div>
            </div>
            <br> <br> <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Measurement Information</h5>
                            <form action="{{ route('measurements.update', $measurement->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="measurement_period">Measurement Period</label>
                                    <input type="text" class="form-control" id="measurement_period" name="measurement_period" value="{{ $measurement->measurement_period }}">
                                </div>
                                <div class="form-group">
                                    <label for="timestamp">Timestamp</label>
                                    <input type="text" class="form-control" id="timestamp" name="timestamp" value="{{ $measurement->timestamp }}">
                                </div>
                                <div class="form-group">
                                    <label for="consumption_value">Consumption</label>
                                    <input type="text" class="form-control" id="consumption_value" name="consumption_value" value="{{ $measurement->consumption_value }}">
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $measurement->location }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Measurement</button>
                                <a href="{{ route('measurements.index', ['meter_id' => $meter->id]) }}" class="btn btn-secondary">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
