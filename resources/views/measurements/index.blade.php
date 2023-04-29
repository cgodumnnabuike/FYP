<x-app-layout>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>All Your Readings</h1>
                </div>
            </div>
            <br> <br> <br>
            <h3>
                <x-alert />
            </h3>
            <div class="row mb-3">
                <div class="col">
                  <a href="{{ route('measurements.create') }}" class="btn btn1">Add Meter reading</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if ($selectedMeter)
                        <h2>{{ $selectedMeter->name }}</h2>
                        @if ($measurements->isEmpty()) 
                            <div class="alert alert-info" role="alert">
                                You don't have any readings for this meter.
                            </div>
                        @else
                            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                                @foreach ($measurements as $measurement)
                                    <div class="col">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $measurement->measurement_period }}</h5>
                                                <p class="card-text">
                                                    <strong>Timestamp:</strong> {{ $measurement->timestamp }}
                                                    <br>
                                                    <strong>Consumption:</strong> {{ $measurement->consumption_value }}
                                                    <br>
                                                    <strong>Location:</strong> {{ $measurement->location }}
                                                </p>
                                                <div class="text-center">
                                                    <a href="{{ route('measurements.show', $measurement->id) }}" class="btn btn-primary btn-sm">View</a>
                                                    <a href="{{ route('measurements.edit', $measurement->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                                    <form action="{{ route('measurements.destroy', $measurement->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this measurement?')">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-4">
                                {{ $measurements->appends(['meter_id' => $selectedMeter->id])->links() }}

                            </div>
                        @endif
                    @else
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-app-layout>

