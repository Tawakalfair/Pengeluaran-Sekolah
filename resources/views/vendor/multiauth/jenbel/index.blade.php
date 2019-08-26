@extends('multiauth::layouts.appadmin')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-info text-white">
                      Jenis Belanja
                      <span class="float-right">
                          <a href="{{route('jenisbelanja.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Jenis Belanja</a>
                      </span>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>kode belanja</th>
                                <th>kode Jenis Belanja</th>
                                <th>Nama Jenis Belanja</th>
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
        ajax: '{!! route('jenisbelanja.getdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'belanja.kode_belanja', name: 'belanja.kode_belanja' },
            { data: 'kode_jenbel', name: 'kode_jenbel' },
            { data: 'nama_jenbel', name: 'nama_jenbel'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
