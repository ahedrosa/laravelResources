@extends('base')

@section('content')
@if(old('id') != '')
    <div class="alert alert-danger" role="alert">
        No se ha editado el elemento con exito.
    </div>
@endif
<div class="col-lg-8 col-md-8 mx-auto">
      <h1 class="fw-light">Resources</h1>
      <p class="lead text-muted">Edit Resource</p>
</div>
</br>
<div class="col-lg-8 col-md-8 mx-auto"> 
    <form action="{{ url('resources/' . $resource['id']) }}" method="post">
        @csrf
        @method('put')
            <input value="{{ old('id') }}" type="number" name="id" placeholder="#id positive integer" min="1" step="1" required />
            <input value="{{ old('name') }}" type="text" name="name" placeholder="Subject's name" min-length="5" max-length="30" required />
            <input value="{{ old('age') }}" type="number" name="age" placeholder="Subject's age" min="1" step="1" required />
        <input type="submit" value="Edit"/>
    </form>
</div>

@endsection