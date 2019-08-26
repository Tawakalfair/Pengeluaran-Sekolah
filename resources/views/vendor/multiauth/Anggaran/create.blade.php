@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Anggaran Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('anggaran.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="Sekolah">Sekolah</label>
                        <select class="form-control" name="sekolah">
                          @foreach ($profile as $profil)
                          <option value="{{$profil->id}}">{{$profil->nama_sekolah}}</option>
                          @endforeach

                        </select>
                      </div>
                      <div class="form-group">
                      <label for="jenbel">Jenis belanja</label>
                      <select class="form-control" name="jenbel">
                        @foreach ($jenbel as $jen)
                        <option value="{{$jen->id}}">{{$jen->kode_jenbel}}-{{$jen->nama_jenbel}}</option>
                        @endforeach

                      </select>
                    </div>
                    <div class="form-group">
                    <label for="kegiatan">Kegiatan</label>
                    <select class="form-control" name="kegiatan">
                      @foreach ($kegiatan as $keg)
                      <option value="{{$keg->id}}">{{$keg->nama_kegiatan}}</option>
                      @endforeach

                    </select>
                  </div>
                        <div class="form-group">
                            <label for="role">Anggaran</label>
                            <input type="number" placeholder="Jumlah Anggaran" name="anggaran" class="form-control" required>
                        </div>
                        <div class="form-group">
                        <label for="Sekolah">Tahun</label>
                        <select class="form-control" name="tahun">
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2021">2021</option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
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
