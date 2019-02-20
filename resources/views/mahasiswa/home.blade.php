@extends('mahasiswa.layouts.app')

@section('main')
<div class="content-wrapper">
<section class="content-header">
      <h1>
        Welcome, {{ $user->name }}
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
            @if(session()->has('success'))
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> {{ session()->get('success') }}</h4>
              </div>
            @endif 

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ $user->image }}" alt="{{ $user->name }}">

              <h3 class="profile-username text-center"></h3>

              <p class="text-muted   text-center"> {{ $user->name }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Bergabung</b> <a class="pull-right">{{ date('d/m/y', strtotime($user->created_at))}}</a>
                </li>
                <li class="list-group-item">
                  <b>NIK</b> <a class="pull-right">{{ $user->NI }}</a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b> <a class="pull-right">{{ $user->tanggal_lahir }}</a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b> <a class="pull-right">{{ $user->jenis_kelamin }}</a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right">{{ $user->phone }}</a>
                </li>
                <li class="list-group-item">
                  <b>E-Mail</b> <a class="pull-right">{{ $user->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Role As</b> <a class="pull-right">{{ $user->role }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

           <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-user margin-r-5"></i> Bio</strong>

                  <p class="text-muted">
                    {{ $user->bio }}
                  </p>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                  <p class="text-muted">{{ $user->alamat }}</p>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Quotes</strong>

                  <p>{{ $user->quotes}}</p>
                </div>
                <!-- /.box-body -->
              

                <!-- aboaut me -->
              </div>

          </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Berita</a></li>
              <li><a href="#timeline" data-toggle="tab">Dosen</a></li>
              <li><a href="#mhs" data-toggle="tab">Mahasiswa</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">

                <div class="callout callout-info">
                  <h4>3 Last Article</h4>

                  <p><a href="{{ route('postviewmahasiswa')}}"> Check This Out </a></p>
                </div>
                
                  <table class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($berita as $res)
                      <tr>
                          <td>{{ $res->title }}</td>
                          <td>
                              @foreach($res->categories as $category)
                              {{ $category->name }} |
                              @endforeach
                          </td>
                          <td>{{ $res->user->name }}</td>
                        <tr>
                    @endforeach
                    
                    </tbody>
                  </table>
                  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                
                  <div class="callout callout-warning">
                    <h4>3 Dosen Last Joined</h4>
                    <p><a href="{{ route('dsnv')}}"> Check This Out </a></p>
                  </div>
                
                  <table class="table table-bordered table-hover text-center">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Jenis Kelamin</th>
                        <th>Phone</th>
                        <th>E-Mail</th>
                        <th>More Info</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($dosen as $res)
                      <tr>
                          <td>{{ $res->name }}</td>
                          <td>{{ $res->jenis_kelamin }}</td>
                          <td>{{ $res->phone }}</td>
                          <td>{{ $res->email }}</td>
                          <td><a href="#" class="btn btn-info"><span class="fa fa-search-plus"></span></a></td>
                        <tr>
                    @endforeach
                    
                    </tbody>
                  </table>
              </div>
              <!-- /.tab-pane -->


              <div class="tab-pane" id="mhs">
                
                <div class="callout callout-success">
                  <h4>3 Mahasiswa Last Joined</h4>
                  <p><a href="{{ route('mhsv')}}"> Check This Out </a></p>
                </div>
              
                <table class="table table-bordered table-hover text-center">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Jenis Kelamin</th>
                      <th>Phone</th>
                      <th>E-Mail</th>
                      <th>More Info</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($mahasiswa as $res)
                    <tr>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->jenis_kelamin }}</td>
                        <td>{{ $res->phone }}</td>
                        <td>{{ $res->email }}</td>
                        <td><a href="#" class="btn btn-info"><span class="fa fa-search-plus"></span></a></td>
                      <tr>
                  @endforeach
                  
                  </tbody>
                </table>
            </div>
            <!-- /.tab-pane -->

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>

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
@endsection


