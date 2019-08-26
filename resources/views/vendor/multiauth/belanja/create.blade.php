@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Belanja Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('belanja.store')}}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="kode_belanja">Kode Belanja</label>
                            <input type="text" placeholder="Kode Belanja" name="kode_belanja" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_belanja">Nama Belanja</label>
                            <input type="text" placeholder="Nama Belanja" name="nama_belanja" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="belanja">Kegiatan</label>
                        <select class="form-control" name="kegiatan">
                          @foreach ($kegiatan as $keg)
                          <option value="{{$keg->id}}">{{$keg->kode_kegiatan}} - {{$keg->nama_kegiatan}}</option>
                          @endforeach

                        </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('belanja') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
