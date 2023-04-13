<x-app-layout>

  <section class="p-5">
    <div class="container text-center">
      <div class="row">
          <div class="col">
              <h1>All your meters</h1>
          </div>
      </div>
      <div class="row">
          <div class="col">
              <a href="{{ route('meters.create') }}" class="btn btn-primary">Add Meter</a>
          </div>
      </div>
    </div>
  </section>
</x-app-layout>