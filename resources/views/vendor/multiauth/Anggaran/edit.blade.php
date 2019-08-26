@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Anggaran Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('anggaran.update',$anggaran->id)}}" method="post">
                        @csrf @method('patch')

                        <div class="form-group">
                        <label for="Sekolah">Sekolah</label>
                        <select class="form-control" name="sekolah">
                          @foreach ($profile as $profil)
                          <option value="{{$profil->id}}" @if ($profil->id == $anggaran->profile_id)
                            selected
                          @endif>{{$profil->nama_sekolah}}</option>
                          @endforeach

                        </select>
                      </div>
                      <div class="form-group">
                      <label for="jenbel">Jenis belanja</label>
                      <select class="form-control" name="jenbel">
                        @foreach ($jenbel as $jen)
                          <option value="{{$jen->id}}"@if ($jen->id == $anggaran->jenbel_id)
                            selected
                          @endif>{{$jen->nama_jenbel}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <select class="form-control" name="kegiatan">
                      @foreach ($kegiatan as $keg)
                        <option value="{{$keg->id}}"@if ($keg->id == $anggaran->kegiatan_id)
                          selected
                        @endif>{{$keg->kode_kegiatan}} - {{$keg->nama_kegiatan}}</option>
                      @endforeach

                    </select>
                    </div>
                        <div class="form-group">
                            <label for="role">Anggaran</label>
                            <input type="number" placeholder="Jumlah Anggaran" name="anggaran" class="form-control" value="{{$anggaran->jumlah_ang}}" required>
                        </div>
                        <div class="form-group">
                        <label for="Sekolah">Tahun</label>
                        <select class="form-control" name="tahun">
                          @for ($i=2019; $i < 2024; $i++)
                          <option value={{$i}} @if ($anggaran->tahun == $i)
                            selected
                          @endif>{{$i}}</option>
                          @endfor

                        </select>
                      </div>
                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('anggaran') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
