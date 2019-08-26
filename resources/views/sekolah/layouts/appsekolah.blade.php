<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} :: Sekolah</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
      <link rel="dns-prefetch" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

      <link href="{{ asset('css/app.css') }}" rel="stylesheet">

      <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
          <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

</head>
<body>
<div id="app">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary navbar-laravel">
<a class="navbar-brand" href="#">Simpegah</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto ml-2">
    <li class="nav-item active">
      <a class="nav-link" href="{{route('sekolah.dashboard')}}">Home <span class="sr-only">(current)</span></a>
    </li>
  <!--  <li class="nav-item">
      <a class="nav-link" href="{route('sekolah.pengeluaran')}}">Pengeluaran</a>
    </li> -->
    <li class="nav-item active">
      <a class="nav-link" href="{{route('sekolah.cetak.pengeluaran')}}">Cetak Pengeluaran</a>
    </li>
    <li class="nav-item dropdown active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pengeluaran
        </a>
        <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
          @foreach ($kegiatan as $keg)
            <a class="dropdown-item" href="{{route('sekolah.pengeluaran',$keg->id)}}">{{$keg->nama_kegiatan}}</a>
          @endforeach

        </div>
      </li>
    </ul>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item dropdown active">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{ Auth::guard('sekolah')->user()->name }} <span class="caret"></span>
      </a>


      <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('profil.show',Auth::guard('sekolah')->user()->id)}}">
            Profil
        </a>
        <a class="dropdown-item" href="{{ route('sekolah.password.change') }}">Ganti Password</a>

          <a class="dropdown-item" href="{{ route('sekolah.logout') }}"
             onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>

          <form id="logout-form" action="{{ route('sekolah.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
      </div>
  </li>
</ul>
</div>
</nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" defer></script>
<!-- Bootstrap JavaScript -->

<!-- App scripts -->
@stack('scripts')
<script type="text/javascript">
$(document).ready( function () {
$('#users-table').DataTable();
} );
$(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');
		});
});

@if(Session::has('message'))
  var type = "{{ Session::get('alert-type', 'info') }}";
  switch(type){
      case 'info':
          toastr.info("{{ Session::get('message') }}");
          break;

      case 'warning':
          toastr.warning("{{ Session::get('message') }}");
          break;

      case 'success':
          toastr.success("{{ Session::get('message') }}");
          break;

      case 'error':
          toastr.error("{{ Session::get('message') }}");
          break;
  }
@endif
</script>
</body>
</html>
