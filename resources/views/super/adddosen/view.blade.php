@extends('super.layouts.app')

@section('main')
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            @if(session()->has('success'))
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> {{ session()->get('success') }}</h4>
              </div>
            @endif 
              <h3 class="box-title">Add Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <form action="{{ route('adddosen.store')}}" method="POST">
                {{ csrf_field()}}
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nama Dosen</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label>E-Mail Dosen</label>
                    <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>
               
                 

                </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </div>
</div>



@endsection

@section('main-script')
  <!-- jQuery 3 -->
<script src="{{ asset('users/jquery/dist/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('users/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('users/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<!-- AdminLTE App -->
<script src="{{ asset('users/dist/js/adminlte.min.js')}}"></script>
@endsection


