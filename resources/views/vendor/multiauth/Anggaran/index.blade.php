@extends('multiauth::layouts.appadmin')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-info text-white">
                      Anggaran
                      <span class="float-right">
                          <a href="{{route('anggaran.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> anggaran</a>
                      </span>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama Sekolah</th>
                                <th>Jenis Belanja</th>
                                <th>Kode Kegiatan</th>
                                <th>Jumlah Anggaran</th>
                                <th>tahun</th>
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
        ajax: '{!! route('anggaran.getdata') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'profile.nama_sekolah', name: 'profile.nama_sekolah' },
            { data: 'jenbel.nama_jenbel', name: 'jenbel.nama_jenbel' },
            { data: 'kegiatan.kode_kegiatan', name: 'kegiatan.kode_kegiatan' },
            { data: 'jumlah_ang', name: 'jumlah_ang', render: $.fn.dataTable.render.number( ',', '.', 2, 'Rp.' )},
            { data: 'tahun', name: 'tahun' },
          //  { data: 'created_at', name: 'created_at' },
          //  { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
