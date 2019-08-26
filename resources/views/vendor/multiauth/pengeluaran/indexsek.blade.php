@extends('sekolah.layouts.appsekolah')
@section('content')

      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-info text-white">
                      Pengeluaran
                      <span class="float-right">
                          <a href="{{route('pengeluaran.create')}}" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> Pengeluaran</a>
                      </span>
                  </div>

                  <div class="card-body">
                    <table class="table table-bordered" id="users-table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Sekolah</th>
                                <th>kode Kegiatan</th>
                                <th>Nama Subkegiatan</th>
                                <th>Kode belanja</th>
                                <th>Kode Subbelanja</th>
                                <th>Jenis Belanja</th>
                                <th>Pengeluaran</th>
                                <th>Tanggal</th>
                                <th>action</th>
                            </tr>
                        </thead>
                    </table>
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
        ajax: '{!! route('pengeluaran.getdatasekolah') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'profile.nama_sekolah', name: 'profile.nama_sekolah' },
            { data: 'kegiatan.kode_kegiatan', name: 'kegiatan.kode_kegiatan'},
            { data: 'subkegiatan.nama_subkegiatan', name: 'subkegiatan.nama_subkegiatan'},
            { data: 'belanja.kode_belanja', name: 'belanja.kode_belanja'},
            { data: 'subbelanja.nama_subbelanja', name: 'subbelanja.nama_subbelanja'},
            { data: 'jenbel.nama_jenbel', name: 'jenbel.nama_jenbel'},
            { data: 'jum_peng', name: 'jum_peng'},
            { data: 'tanggal', name: 'tanggal'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});
</script>
@endpush
