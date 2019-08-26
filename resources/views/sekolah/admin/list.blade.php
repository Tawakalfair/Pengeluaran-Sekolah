@extends('multiauth::layouts.appadmin')
@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Sekolah List
                <span class="float-right">
                        <a href="{{route('sekolah.create')}}" class="btn btn-sm btn-success">New Sekolah</a>
                    </span>
                </div>
                <div class="card-body">
    @include('multiauth::message')
                    <ul class="list-group">
                      @forelse ($sekolah as $sek)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          @if (count($sek->profile) > 0)
                          <p class="text-dark">{{ $sek->profile->nama_sekolah }}</p>
                            <div class="image-parent ml-auto mr-3">
                            <img src="{{asset('uploads/profil/'.$sek->profile->foto)}}"  width="85" class="img-fluid" alt="quixote">
                        </div>
                          @else
                            {{ $sek->name}}
                            <div class="image-parent ml-auto mr-3">
                            <img src="{{asset('uploads/profil/sekolah.jpeg')}}"  width="85" class="img-fluid" alt="quixote">
                        </div>
                        @endif
                            <div class="float-right">
                            <form class="form-inline"  action="{{route('sekolah.destroy',$sek->id)}}" method="POST" >
                            @csrf
                            @method('delete')
                          <!--  <a href="{route('sekolah.edit',$sek->id)}}" class="btn btn-sm btn-primary mr-2"><i class="fas fa-edit"></i></a>
                          -->
                            <button class="top-right btn btn-sm btn-secondary" type="submit"><i class="fas fa-times"></i></button>
                            </form>


                            </div>

                        </li>
                      @empty

                          <p>Tidak ada Sekolah </p>
                      @endforelse
                      <div class="d-flex justify-content-center mt-2">
                          {{$sekolah->links()}}
                      </div>




                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
