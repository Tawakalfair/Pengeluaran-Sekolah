@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Pengeluaran Edit</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('penge.update',$pengeluaran->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                        <label for="sekolah">Sekolah</label>
                        <select class="form-control" name="sekolah">
                          @foreach ($profile as $profil)
                          <option value="{{$profil->id}}" @if ($profil->id == $pengeluaran->profile_id)
                            selected
                          @endif>{{$profil->id}} - {{$profil->nama_sekolah}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="kode_kegiatan">Kegiatan</label>
                        <select class="form-control" name="kegiatan">
                          @foreach ($kegiatan as $keg)
                          <option value="{{$keg->id}}" @if ($keg->id == $pengeluaran->kegiatan_id)
                            selected
                          @endif>{{$keg->id}} - {{$keg->nama_kegiatan}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="subkegiatan">Subkegiatan</label>
                        <select class="form-control" name="subkegiatan">
                          @foreach ($subkegiatan as $sub)
                          <option value="{{$sub->id}}" @if ($sub->id == $pengeluaran->subkegiatan_id)
                            selected
                          @endif>{{$sub->id}} - {{$sub->nama_subkegiatan}}</option>
                          @endforeach

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
