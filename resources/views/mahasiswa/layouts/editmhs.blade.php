@extends('mahasiswa.layouts.app')

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
              <h3 class="box-title">Data Users</h3>
            </div>
            <div>
                @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="form-contact" action="{{ route('updatemhs', $user->id)}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                <input name="_method" type="hidden" value="PUT">
                {{ csrf_field() }} 
                        
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">NIK *</label>
                            <div class="col-md-6">
                                <input type="text" id="NI" name="NI" value="{{ $user->NI }}" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Name *</label>
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Phone *</label>
                            <div class="col-md-6">
                                <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
                            </div>
                        </div>       

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Jenis Kelamin *</label>
                            <div class="col-md-6">
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">Jenis Kelamin....</option>
                                    <option value="Laki-Laki"
                                            @if($user->jenis_kelamin == "Laki-Laki")
                                                selected
                                            @endif>Laki-Laki</option>
                                    <option value="Perempuan"
                                            @if($user->jenis_kelamin == "Perempuan")
                                                selected
                                            @endif
                                    >Perempuan</option>
                                </select>
                            </div>
                        </div>    

                        <div class="form-group">
                        <label for="name" class="col-md-3 control-label">Tanggal Lahir *</label>
                            <div class="col-md-6">
                                    <div class="input-group date" id="datepicker">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                    <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" value="{{ $user->tanggal_lahir }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Alamat *</label>
                            <div class="col-md-6">
                                <textarea name="alamat" id="alamat" rows="4" class="form-control">{{ $user->alamat }}</textarea>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Bio / Describe You *</label>
                            <div class="col-md-6">
                                <textarea name="bio" id="bio" rows="6" class="form-control">{{ $user->bio }}</textarea>
                            </div>
                        </div>   

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">E-Mail * </label>
                            <div class="col-md-6">
                                <input type="text" id="quotes" name="quotes" class="form-control" value="{{ $user->quotes }}">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">E-Mail * </label>
                            <div class="col-md-6">
                                <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>   

                        <div class="form-group">
                            <label for="name" class="col-md-3 control-label">Photo Profil * </label>
                            <div class="col-md-6">
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                        </div>   

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-save">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
<!-- DataTables -->
<script src="{{ asset('users/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('users/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{ asset('users/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script>
    $(function() {
      $("body").delegate("#tanggal_lahir", "focusin", function(){
        $(this).datepicker();
     });
    });       

</script>
@endsection


