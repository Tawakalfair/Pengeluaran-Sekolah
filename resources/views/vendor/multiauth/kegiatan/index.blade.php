@extends('multiauth::layouts.appadmin')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-info text-white">
                      Kegiatan
                      <span class="float-right">
                          <a href="{{route('kegiatan.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Kegiatan</a>
                      </span>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>kode Kegiatan</th>
                                <th>Nama Kegiatan</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>action</th>
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
        ajax: '{!! route('kegiatan.getdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'kode_kegiatan', name: 'kode_kegiatan' },
            { data: 'nama_kegiatan', name: 'nama_kegiatan'},
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
