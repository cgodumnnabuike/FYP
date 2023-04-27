<x-app-layout>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>All Your Readings</h1>
                </div>
            </div>
            <br> <br>
            <br>
            <h3>
                <x-alert />
            </h3>
            <div class="row mb-3">
                <div class="col">
                    <a href="{{ route('measurements.create') }}" class="btn btn-primary">Add Meter reading</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    @if ($measurements->isEmpty())
                        <div class="alert alert-info" role="alert">
                            You don't have any readings yet.
                        </div>
                    @else
                        <div class="card">
                            <div class="card-body">
                                <div class="table-wrapper-scroll-y table-responsive-sm">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Measurement period</th>
                                                <th scope="col">Timestamp</th>
                                                <th scope="col">Consumption</th>
                                                <th scope="col">Location</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($measurements as $measurement)
                                                <tr>
                                                    <td>{{ $measurement->measurement_period }}</td>
                                                    <td>{{ $measurement->timestamp }}</td>
                                                    <td>{{ $measurement->consumption_value }}</td>
                                                    <td>{{ $measurement->location }}</td>
                                                    <td>
                                                        {{-- Add your action buttons here --}}
                                                    </td>
                                                </tr>
                                            @endforeach
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
