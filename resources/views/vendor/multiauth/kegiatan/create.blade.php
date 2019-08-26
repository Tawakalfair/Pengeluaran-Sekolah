@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Kegiatan Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('kegiatan.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="kode_kegiatan">Kode Kegiatan</label>
                            <input type="text" placeholder="Kode Kegiatan" name="kode_kegiatan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" placeholder="Nama Kegiatan" name="nama_kegiatan" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('kegiatan') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
