<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Web Portal Mahasiswa</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('users/select2/dist/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('users/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('users/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('users/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('users/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('users/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ asset('users/dist/css/skins/_all-skins.min.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box bg-primary">
@if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
@endif
  <div class="register-logo">
    <cite>Web Portal Mahasiswa</cite>
  </div>  
  
  <div class="register-box-body">
    <p class="login-box-msg">Lupa Password Akun</p>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
      <div class="form-group has-feedback">
      <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="E-Mail">

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
     
      <div class="row">
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="{{ route('login')}}" class="text-center">Sudah Memiliki Akun</a>
    <p><a class="text-center" href="{{ route('register')}}" class="text-center">Buat Akun Baru</a></p>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<script src="{{ asset('users/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('users/jquery-ui/jquery-ui.min.js')}}"></script>

</body>
</html>

