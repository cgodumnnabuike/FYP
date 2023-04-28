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
            <div class="row">
                <div class="col">
                    @foreach ($meters as $meter)
                        <h2>{{ $meter->name }}</h2>
                        @if ($meter->measurements->isEmpty()) 
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
                                                @foreach ($meter->measurements as $measurement)
                                                    <tr>
                                                        <td>{{ $measurement->measurement_period }}</td>
                                                        <td>{{ $measurement->timestamp }}</td>
                                                        <td>{{ $measurement->consumption_value }}</td>
                                                        <td>{{ $measurement->location }}</td>
                                                        <td>
                                                            <a href="{{ route('measurements.show', $measurement->id) }}" class="btn btn-primary btn-rounded btn-fw btn-sm">View</a>
                                                            <a href="{{ route('measurements.edit', $measurement->id) }}" class="btn btn-secondary btn-rounded btn-fw btn-sm">Edit</a>
                                                            <form action="{{ route('measurements.destroy', $measurement->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-rounded btn-fw btn-sm" onclick="return confirm('Are you sure you want to delete this measurement?')">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
