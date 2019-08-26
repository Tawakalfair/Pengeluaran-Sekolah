@extends('sekolah.layouts.appsekolah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Data</div>

                <div class="card-body">
                  @if ($cekprof->isEmpty())
                    <form method="POST" action="{{route('profil.store')}}" enctype="multipart/form-data" aria-label="Store">
                    @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input  type="number" class="form-control" name="sekolah_id" value="{{Auth::guard('sekolah')->user()->id}}" hidden>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Sekolah</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama_sekolah') ? ' is-invalid' : '' }}" name="nama_sekolah" required autofocus>

                                @if ($errors->has('name_sekolah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" required>

                                @if ($errors->has('no_telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-6">
                                <textarea name="alamat" rows="8" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" cols="80" ></textarea>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="file" class="form-control-file{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" required>
                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Store
                                </button>
                            </div>
                        </div>
                    </form>

                @elseif (!$cekprof->isEmpty())
                  <form method="POST"  action="{{route('profil.update',Auth::guard('sekolah')->user()->id)}}" enctype="multipart/form-data" aria-label="Store">
                    @method('PATCH')
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input  type="number" class="form-control" name="sekolah_id" value="{{Auth::guard('sekolah')->user()->id}}" hidden>


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nama Sekolah</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('nama_sekolah') ? ' is-invalid' : '' }}" name="nama_sekolah" value="{{$profil->nama_sekolah}}" required autofocus>

                                @if ($errors->has('name_sekolah'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Nomor Telepon</label>

                            <div class="col-md-6">
                                <input id="number" type="number" class="form-control{{ $errors->has('no_telp') ? ' is-invalid' : '' }}" name="no_telp" value="{{$profil->no_telp}}" required>

                                @if ($errors->has('no_telp'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('no_telp') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                            <div class="col-md-6">
                                <textarea name="alamat" rows="8" class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" cols="80" >{{$profil->alamat}}</textarea>

                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">Foto</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="file" class="form-control-file{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" required>
                                @if ($errors->has('foto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('foto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Store
                                </button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
