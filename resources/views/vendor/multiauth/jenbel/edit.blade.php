@extends('multiauth::layouts.appadmin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Jenis Belanja Baru</div>

                <div class="card-body">
    @include('multiauth::message')
                    <form action="{{route('jenisbelanja.update',$jenisbelanja->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                        <label for="belanja_id">Kode belanja</label>
                        <select class="form-control" name="belanja">
                          @foreach ($belanja as $bel)
                          <option value="{{$bel->id}}"@if ($bel->id == $jenisbelanja->belanja_id)
                            selected
                          @endif>{{ $bel->kegiatan->kode_kegiatan }} - {{$bel->kode_belanja}} - {{$bel->nama_belanja}}</option>
                          @endforeach

                        </select>
                        </div>
                        <div class="form-group">
                            <label for="kode_jenbel">Kode Jenis Belanja</label>
                            <input type="text" placeholder="Kode Jenis belanja" name="kode_jenbel" value="{{$jenisbelanja->kode_jenbel}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_jenbel">Nama Jenis Belanja</label>
                            <input type="text" placeholder="Nama Jenis Belanja" name="nama_jenbel" value="{{$jenisbelanja->nama_jenbel}}" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('jenisbelanja') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
