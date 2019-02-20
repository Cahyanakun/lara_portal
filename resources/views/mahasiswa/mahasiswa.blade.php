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
              <h3 class="box-title">Data Mahasiswa</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>                
                  <th>No Induk</th> 
                  <th>Jenis Kelamin</th>   
                  <th>Tanggal Lahir</th>   
                  <th>E-Mail</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>No Induk</th> 
                  <th>Jenis Kelamin</th>   
                  <th>Tanggal Lahir</th>
                  <th>E-Mail</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      </div>
</div>
@include('dosen.form')

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
                var table = $('#datatable').DataTable({
                    processing: true,
                    ServerSide: true,
                    ajax: "{{ route('api.mhsv') }}",
                    columns: [
                      {data: 'id', name: 'id'},
                      {data: 'name', name: 'name'},
                      {data: 'NI', name: 'NI'},
                      {data: 'jenis_kelamin', name: 'jenis_kelamin'},
                      {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                      {data: 'email', name: 'email'},
                      {data: 'role', name: 'role'},
                      {data: 'action', name: 'action', orderable:false, searchable:false}
                    ]
                });


                function showData(id) {
        $('.modal-title').text('Detail');
        $('.modal-btn-save').addClass('hide');

         $.ajax({
              url: "{{ url('mhss') }}" + '/' + id,
              type: "GET",
              dataType: 'html',
              success: function (response) {
                  $('.modal-body').html(response);
              }
          });
          $('.modal').modal('show');
      }
</script>

@endsection


