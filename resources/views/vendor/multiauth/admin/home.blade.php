@extends('multiauth::layouts.appadmin')
@section('content')

        <div class="col">
            <div class="card">


                <div class="card-body">
                @include('multiauth::message')
                    <h3 class="text-center">Selamat Datang Admin</h3>
                    <div class="text-center">
                      <img src="{{asset('uploads/dinas.png')}}" height="300" width="300" class="rounded" alt="Responsive image">
                    </div>
                <h3 class="text-center">Di Website SIMPEGAH</h3>
                <h3 class="text-center">Dinas Pendidikan Kebudayaan dan Pemuda Olahraga Kabupaten Semarang</h3>
                <p class="text-center text-dark">Jalan Gatot Subroto No. 20 B, Ungaran, Ungaran Barat, Cirebonan, Bandarjo, Semarang, Jawa Tengah 50517</p>
                </div>
            </div>
        </div>

@endsection
