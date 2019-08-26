@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Pengeluaran Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('penge.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <select class="form-control" name="sekolah">
                          @foreach ($profile as $profil)
                          <option value="{{$profil->id}}">{{$profil->id}} - {{$profil->nama_sekolah}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="kode_kegiatan">Kegiatan</label>
                        <select class="form-control" name="kegiatan">
                          @foreach ($kegiatan as $keg)
                          <option value="{{$keg->id}}">{{$keg->id}} - {{$keg->nama_kegiatan}}</option>
                          @endforeach

                        </select>
                        </div>
                        
                        <div class="form-group">
                        <label for="belanja">Belanja</label>
                        <select class="form-control" name="belanja">
                          @foreach ($belanja as $bel)
                          <option value="{{$bel->id}}">{{$bel->id}} - {{$bel->nama_belanja}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="jenbel">Jenis Belanja</label>
                        <select class="form-control" name="jenbel">
                          @foreach ($jenbel as $jen)
                          <option value="{{$jen->id}}">{{$jen->id}} - {{$jen->nama_jenbel}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran">Pengeluaran</label>
                            <input type="number" placeholder="Pengeluaran" name="pengeluaran" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date"  name="tanggal" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('pengeluaran') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
