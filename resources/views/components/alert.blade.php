{{-- <div>
    @if(session()->has('success'))
            {{session()->get('success')}}
    @elseif($errors->any())
        @foreach($errors->all() as $error)
            {{$error}}
        @endforeach
    @endif
</div> --}}

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success !</strong> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif