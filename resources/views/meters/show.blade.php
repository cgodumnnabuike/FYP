<x-app-layout>
    <section class="p-5">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <h1>Meter Details</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $meter->name }}</h3>
                            <p class="card-text"><strong>Location: </strong>{{ $meter->location }}</p>
                            <p class="card-text"><strong>User: </strong>{{ $meter->user->name }}</p>
                            <a href="{{ route('measurements.create') }}" class="btn btn1">Add Measurement</a>
                        </div>
                    </div>
                </div>
                <div id="chart"></div>
            </div>
        </div>
    </section>
</x-app-layout> 