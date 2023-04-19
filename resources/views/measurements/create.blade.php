<x-app-layout>
    <form action="{{ route('measurements.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="meter_number">Meter Number</label>
            <input type="text" name="meter_number" class="form-control" required>
        </div>

        <!-- Add other fields for measurement data here -->

        <button type="submit" class="btn btn-primary">Add Measurement Data</button>
    </form>
</x-app-layout>