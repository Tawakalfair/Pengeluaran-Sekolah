<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Page</title>

    <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- Styles -->


</head>

<body>
  <div id="app">
  <div class="wrapper">
      <!-- Sidebar  -->
      <nav id="sidebar">
          <div class="sidebar-header text-center">
              <img src="{{asset('uploads/profil/admin.jpg')}}" class="rounded-circle img-size" alt="">
              <div class="">
                <p class="text-white pt-1">{{ auth('admin')->user()->name }}</p>
                {{ auth('admin')->user()->name }}
              </div>

          </div>

          <ul class="list-unstyled components">
              <li class="active">
                  <a href="{{ route('admin.home') }}" >Home</a>

              </li>
              <li>
                  <a href="#sekolah" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sekolah</a>
                  <ul class="collapse list-unstyled" id="sekolah">

                    <li>
                        <a href="{{ route('admin.sekolah') }}" >Sekolah</a>
                    </li>
                      <li>
                        <a  href="{{route('pengeluaran')}}">Pengeluaran</a>

                      </li>
                      <li>
                        <a  href="{{route('admin.cetak.pengeluaran')}}">Cetak</a>

                      </li>


                      </ul>
              </li>

          <!--    <li>
                  <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Privacy</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                      @ admin('super')
                      <li>

                            <a class="dropdown-item text-white" href="{ { route('admin.show') }}">{ { ucfirst(config('multiauth.prefix')) }}</a>

                      </li>
                      <li>
                        <a class="dropdown-item text-white" href="{ { route('admin.roles') }}">Roles</a>

                      </li>
                      @ endadmin
                      </ul>
              </li> -->
              <li>
                  <a href="{{route('anggaran')}}">Anggaran</a>
              </li>
              <li>
                  <a href="#kegiatan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Kegiatan</a>
                  <ul class="collapse list-unstyled" id="kegiatan">

                      <li>

                            <a class="dropdown-item text-white" href="{{route('kegiatan')}}">Kegiatan</a>

                      </li>


                      </ul>
              </li>

                <li>
                    <a href="#belanja" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Belanja</a>
                    <ul class="collapse list-unstyled" id="belanja">

                        <li>

                              <a class="dropdown-item text-white" href="{{route('belanja')}}">Belanja</a>

                        </li>
                        <li>
                          <a class="dropdown-item text-white" href="{{route('jenisbelanja')}}">Jenis Belanja</a>

                        </li>

                        </ul>
                </li>


          </ul>


      </nav>

      <!-- Page Content  -->
      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                      <i class="fas fa-align-left"></i>
                      <span>Toggle Sidebar</span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-align-justify"></i>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest('admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.login')}}">{{ ucfirst(config('multiauth.prefix')) }} Login</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ auth('admin')->user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="{{ route('admin.password.change') }}">Ganti Password</a>
                                <a class="dropdown-item" href="/admin/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                  </div>
              </div>
          </nav>
          <main>
              @yield('content')
          </main>

      </div>
  </div>
</div>

<!-- jQuery -->
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

      $(document).ready(function () {
          $('#sidebarCollapse').on('click', function () {
              $('#sidebar').toggleClass('active');
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
