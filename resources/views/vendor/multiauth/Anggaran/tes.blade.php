@extends('multiauth::layouts.appadmin')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-info text-white">
                      Roles
                      <span class="float-right">
                          <a href="" class="btn btn-sm btn-success">New </a>
                      </span>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Created At</th>
              <th>Updated At</th>
                            </tr>
                        </thead>
                    </table>
                  </div>
              </div>
          </div>
      </div>
  </div>

@stop

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('user.getdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' }
        ]
    });
});
</script>
@endpush
