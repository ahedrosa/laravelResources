
@extends('base')

@section('content')
    
  <!--Delete alert -->
    <div class="modal" id="modalDelete" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Confirm delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Confirm delete?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <form id="modalDeleteResourceForm" action="" method="post">
                @method('delete')
                @csrf
                <input type="submit" class="btn btn-primary" value="Delete resource"/>
            </form>
          </div>
        </div>
      </div>
    </div>
<!-- Delete alert-->

<!--Message from resource controller-->
    @isset($message)
    <div class="alert alert-{{($data['type']) ?? 'success'}}" role="alert">
        {{ $message }}
    </div>
    @endisset

    <div class="col-lg-8 col-md-8 mx-auto">
      <h1 class="fw-light">Resources</h1>
      <p class="lead text-muted">All our resources HERE</p>
      <!--<p>-->
      <!--  <a href="{{ url ('resources') }}" class="btn btn-primary my-2">Resources</a>-->
      <!--  <a href="#" class="btn btn-secondary my-2">Secondary action</a>-->
      <!--</p>-->
    </div>
    
<!--Message from resource controller-->
  <div class="col-lg-8 col-md-8 mx-auto">  
    <table class="table table-striped">
      <thead>
          <tr>
              <th scope="col"># id</th>
              <th scope="col">name</th>
              <th scope="col">age</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($resources as $resource)
              <tr>
                  <td>
                      {{ $resource['id'] }}
                  </td>
                  <td>
                      {{ $resource['name'] }}
                  </td>
                  <td>
                      {{ $resource['age'] }}
                  </td>
                  <td>
                      <a href="{{ route('resources.edit', $resource['id']) }}">edit</a>
                  </td>
                  <td>
                      <form class="deleteForm" action="{{ url('resources/' . $resource['id']) }}" method="post">
                          @method('delete')
                          @csrf
                          <input type="submit" value="delete"/>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
    </table>
    </div>
    <div class="col-lg-8 col-md-8 mx-auto">
        <p>
          <a href="{{ url('resources/create') }}" class="btn btn-primary my-2" type="button">Add new resource</a>
          <a href="{{ url('resources/flush/all') }}" class="btn btn-danger my-2" type="button">Delete ALL resource</a>
        </p>
    </div>
    <form id="deleteResourceForm" action="" method="post">
        @method('delete')
        @csrf
    </form>
    
@endsection

@section('js')
<!--js necesario para mostral el mensaje del delete-->
<script src="{{ url('assets/js/delete.js') }}"></script>
@endsection

