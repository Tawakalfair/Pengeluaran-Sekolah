@extends('sekolah.layouts.appsekolah')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Sekolah Profil <a href="{{route('profil.edit',Auth::guard('sekolah')->user()->id)}}" class="btn btn-info float-right">Edit Profil</a> </div>

                <div class="card-body bg-dark">
                  <div class="row">
  <div class="col-md-8 col-sm-8">
    @forelse ($profil as $prof)
      <h3 class="card-text text-white"><strong>Nama Sekolah: </strong> {{$prof->nama_sekolah}} </h3>
      <p class="card-text text-putih-hitam"><strong>Nomor Telepon: </strong> {{$prof->no_telp}} </p>
      <p class="card-text text-putih-hitam"><strong>Alamat: </strong> {{$prof->alamat}} </p>
      <p class="card-text text-putih-hitam"><strong>Email: </strong> {{$prof->sekolah->email}} </p>
      @empty


      <p>Profil belum Di buat</p>
    @endforelse

  </div>
  @if (count($profil) > 0)
    <div class="col-md-4 col-sm-4 text-center">
      <a href="#" class="pop">
      <img src="{{asset('uploads/profil/'.$prof->foto)}}" style="width: 250px; height: 250px;">
  </a>

  </div>
  @endif



                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Creates the bootstrap modal where the image will appear -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
      	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>


@endsection
