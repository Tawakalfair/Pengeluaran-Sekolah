@extends('sekolah.layouts.appsekolah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Pengeluaran Edit</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('pengeluaran.update',$pengeluaran->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="text" class="form-control" name="sekolah" value="{{ Auth::guard('sekolah')->user()->id }}" hidden>
                        <div class="form-group">
                        <label for="kode_kegiatan">Kegiatan</label>
                        <select class="form-control" name="kegiatan">

                          <option value="{{$kegiatan->id}}" >{{$kegiatan->id}} - {{$kegiatan->nama_kegiatan}}</option>
                          

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="belanja">Belanja</label>
                        <select class="form-control" name="belanja">
                          @foreach ($belanja as $bel)
                          <option value="{{$bel->id}}" @if ($bel->id == $pengeluaran->belanja_id)
                          selected
                          @endif>{{$bel->id}} - {{$bel->nama_belanja}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="jenbel">Jenis Belanja</label>
                        <select class="form-control" name="jenbel">
                          @foreach ($jenbel as $jen)
                          <option value="{{$jen->id}}" @if ($jen->id == $pengeluaran->jenbel_id)
                          selected
                          @endif>{{$jen->id}} - {{$jen->nama_jenbel}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                            <label for="pengeluaran">Pengeluaran</label>
                            <input type="number" placeholder="Pengeluaran" name="pengeluaran" value="{{$pengeluaran->jum_peng}}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date"  name="tanggal" class="form-control" value="{{$pengeluaran->tanggal}}" required>
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
