<x-app-layout>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Measurement Details</h1>
                </div>
            </div>
            <br> <br> <br>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Measurement Information</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Measurement Period:</strong> {{ $measurement->measurement_period }}</li>
                                <li class="list-group-item"><strong>Timestamp:</strong> {{ $measurement->timestamp }}</li>
                                <li class="list-group-item"><strong>Consumption:</strong> {{ $measurement->consumption_value }}</li>
                                <li class="list-group-item"><strong>Location:</strong> {{ $measurement->location }}</li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <a href="{{ route('measurements.index', ['meter_id' => $meter->id]) }}" class="btn btn1">Back to All Measurements</a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
