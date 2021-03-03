<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="id" >
    <meta name="description" content="Regiistrasi Member Gis Digital">
    <meta name="keywords" content="Registrasi, Login, Member, Gis Digital, instagram, whatsapp, twitter, tokopedia, bukalapak, blibli, template gis, desain gis, desain ppt, desain power point, template ppt, template power point">
    <title>Registrasi - Sistem Informasi KKP & TA </title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/favicon.png') }}">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    
    <link rel="stylesheet" href="{{ asset('/assets/plugins/font-awesome/css/font-awesome.min.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Lato&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&amp;display=swap" rel="stylesheet">
    
    <script src="{{ asset('/assets/js/vendors/jquery-3.2.1.min.js') }}"></script>

    <!-- Core -->
    <link href="{{ asset('/assets/css/core.css') }}" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('/themes/pergo/assets/plugins/aos/dist/aos.css') }}" />
      
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/plugins/jquery-toast/css/jquery.toast.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/plugins/boostrap/colors.css') }}" id="theme-stylesheet">

    <link href="{{ asset('/assets/css/util.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/keyframes.css') }}" rel="stylesheet">
    <link href="{{ asset('/themes/pergo/assets/css/theme_style.css') }}" rel="stylesheet">
    <link href="{{ asset('/themes/pergo/assets/css/theme_footer.css') }}" rel="stylesheet">
</head>
<body class="">
    <div class="auth-login-form">
        <div class="form-login">
            <form class="actionForm" action="{{ route('register') }}" method="POST">
                @csrf
                    <div>
                        <div class="card-title text-center">
                            <div class="site-logo">
                                <a href="{{ url('/') }}">
                                    <img src="../assets/images/logo-white.png" alt="website-logo">
                                </a>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <div class="form-group">
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fa fa-address-card-o"></i>  </span>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autocomplete="username" autofocus>
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fe fe-user"></i>  </span>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="NIM" value="{{ old('username') }}" required autocomplete="username">
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fa fa-envelope-o"></i>  </span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="E-mail" value="{{ old('email') }}" required autocomplete="username">
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fa fa-key"></i></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" value="{{ old('password') }}" required autocomplete="current">
                            </div>  
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fa fa-key"></i></span>
                                <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Masukan Ulang Password" value="{{ old('password_confirmation') }}" required autocomplete="password_confirmation">
                            </div> 
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fe fe-user"></i>  </span>
                                <input id="fakultas" type="text" class="form-control @error('fakultas') is-invalid @enderror" name="fakultas" placeholder="Fakultas" value="{{ old('fakultas') }}" required autocomplete="fakultas" >
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fe fe-user"></i>  </span>
                                <input id="jurusan" type="text" class="form-control @error('jurusan') is-invalid @enderror" name="jurusan" placeholder="Jurusan" value="{{ old('jurusan') }}" required autocomplete="jurusan" >
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fe fe-user"></i>  </span>
                                <input id="telp" type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" placeholder="No. Telepon/Hp" value="{{ old('telp') }}" required autocomplete="telp" >
                            </div>
                            <div class="input-icon mb-5">
                                <span class="input-icon-addon"> <i class="fe fe-user"></i>  </span>
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}" required autocomplete="alamat" ></textarea>
                            </div>
                            <div class="input-icon mb-5">
                                <a href="{{ route('login') }}" class="text-right ">Sudah Punya Akun</a>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-pill btn-2 btn-block btn-submit btn-gradient">Daftar</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('/assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/assets/js/vendors/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('/assets/js/core.js') }}"></script>
</body>
</html>