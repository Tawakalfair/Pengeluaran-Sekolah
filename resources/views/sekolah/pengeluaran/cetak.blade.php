@extends('sekolah.layouts.appsekolah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">Pengeluaran Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('sekolah.cetak')}}" method="post">
                        @csrf

                        <input type="text" class="form-control" name="sekolah" value="{{Auth::guard('sekolah')->user()->id}}" hidden>

                        <div class="form-group">
                        <label for="kode_kegiatan">Kegiatan</label>
                        <select class="form-control" name="kegiatan">
                          @foreach ($kegiatan as $keg)
                          <option value="{{$keg->id}}">{{$keg->id}} - {{$keg->nama_kegiatan}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                        <label for="bulan">Bulan</label>
                        <select class="form-control" name="bulan">
                          <option value='1'>Janaury</option>
                           <option value='2'>February</option>
                           <option value='3'>March</option>
                           <option value='4'>April</option>
                           <option value='5'>May</option>
                           <option value='6'>June</option>
                           <option value='7'>July</option>
                           <option value='8'>August</option>
                           <option value='9'>September</option>
                           <option value='10'>October</option>
                           <option value='11'>November</option>
                           <option value='12'>December</option>
                        </select>
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

                        <button type="submit" class="btn btn-primary btn-sm">Cetak</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
