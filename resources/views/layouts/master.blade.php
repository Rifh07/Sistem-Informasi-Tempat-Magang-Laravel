<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Content-Language" content="en">
  <meta name="description" content="Taruh deskripsi disini">
  <meta name="keywords" content="Taruh keyword disini">

  <title>@yield('title_halaman') - Sistem Informasi KKP & TA</title>

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.png') }}">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">

  <link rel="stylesheet" href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    
  <script src="{{ asset('/assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

  <!-- Core -->
  <link href="{{ asset('/assets/css/core.css') }}" rel="stylesheet">
      
  
  <!-- toast -->
  <link rel="stylesheet" type="text/css" href="{{ asset('/assets/plugins/jquery-toast/css/jquery.toast.css') }}">
  <link rel="stylesheet" href="{{ asset('/assets/plugins/boostrap/colors.css') }}" id="theme-stylesheet">
    
  <!-- emoji -->
  <link href="{{ asset('/assets/css/util.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/css/layout.css') }}" rel="stylesheet">
  <link href="{{ asset('/assets/css/footer.css') }}" rel="stylesheet">
</head>
<body class="theme-purple">
    <div class="page">
      <div class="page-main">

        <!-- header -->
        <div class="header top  py-4">
          <div class="container">
            <div class="d-flex">
              <a class="" href="{{ route('home') }}">
                <img src="{{ asset('/assets/images/logo-white.png') }}" alt="Website logo" style="max-height: 40px;">
              </a>
              <div class="d-flex order-lg-2 ml-auto my-auto">
                     

                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    <span class="avatar" style="background-image: url({{ asset('/assets/images/user-avatar.png') }})"></span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default text-white">Hi, 
                      <span class="text-uppercase">{{ Auth::user()->name }}</span>!
                      </span>
                      <small class="text-muted  text-white d-block mt-1"> {{ Auth::user()->role }}</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <i class="dropdown-icon fe fe-log-out"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler text-white d-lg-none ml-3 ml-lg-0 my-auto" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>

        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-lg order-lg-first">

                <!-- MENU -->
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="fe fe-home"></i> Dashboard</a>
                  </li>
                  @if(\Auth::user()->role == "Kepala Program Studi")
                    <li class="nav-item">
                      <a href="{{ route('viewsCompany') }}" class="nav-link"><i class="fa fa-building"></i> Perusahaan</a>
                    </li> 
                  @elseif(\Auth::user()->role == "Admin")
                    <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fa fa-building"></i> Perusahaan</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="{{ route('viewsCompany') }}" class="dropdown-item">Lihat Perusahaan</a>
                        <a href="{{ route('addCompanyViews') }}" class="dropdown-item">Tambah Perusahaan</a>
                      </div>
                    </li> 
                    <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-users"></i>Users</a>
                      <div class="dropdown-menu dropdown-menu-arrow">
                        <a href="{{ route('createUsersViews') }}" class="dropdown-item">Tambah Users</a>
                      </div>
                    </li>
                  @else
                    <li class="nav-item">
                      <a href="{{ route('historyInternshipViews') }}" class="nav-link"><i class="fa fa-tasks"></i> Riwayat Apply</a>
                    </li> 
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="my-3 my-md-5">
           <div class="container">
{{-- MULAI ISI KONTENT --}}
@yield('konten')
{{-- AKHIR ISI KONTENT --}}
           </div>
        </div>

       </div>
    </div>

    <div class="footer footer_top dark">
      <div class="container m-t-60 m-b-50">
        <div class="row">
          <div class="col-lg-12">
            <div class="site-logo m-b-30">
              <a href="index.html" class="m-r-20">
                <img src="{{ asset('/assets/images/logo-white.png') }}" alt="Website logo">
              </a>
            </div>
          </div>
          <div class="col-lg-8 m-t-30  mt-lg-0">
            <h4 class="title">Quick Links</h4>
            <div class="row">
              <div class="col-6 col-md-3  mt-lg-0">
                <ul class="list-unstyled quick-link mb-0">
                  <li><a href="index.html">Home</a></li>
                  <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-4 m-t-30 mt-lg-0">
            <h4 class="title">Kontak Admin</h4>
            <table>
              <tr>
                <td width="80px">Admin 1</td>
                <td>: 0888-8888-8888</td>
              </tr>
              <tr>
                <td>Admin 2</td>
                <td>: 0888-8888-8888</td>
              </tr>
              <tr>
                <td>Admin 3</td>
                <td>: 0888-8888-8888</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer footer_bottom dark">
      <div class="container">
        <div class="row align-items-center flex-row-reverse">
          <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
            Copyright &copy; 2020 - KKP Kelompok        
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/selectize.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/jquery.tablesorter.min.js') }}"></script>

    <script src="{{ asset('/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('/assets/js/core.js') }}"></script>
    <!-- toast -->
    <script type="text/javascript" src="{{ asset('/assets/plugins/jquery-toast/js/jquery.toast.j') }}s"></script>
    <!-- Tiny Editor -->
    <script type="text/javascript" id="tinymce-js" src="{{ asset('/assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <!-- flags icon -->
    <script src="{{ asset('/assets/plugins/flags/js/docs.js') }}"></script>



    <!-- general JS -->
    <script src="{{ asset('/assets/js/process.js') }}"></script>
    <script src="{{ asset('/assets/js/general.js') }}"></script> 

</body>
</html>