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
              <h3 class="box-title">Data Pengguna</h3>
              <a href="{{ route('post.create')}}" class="btn btn-primary pull-right modal-show" title="Create User"><i class="fa fa-plus-circle"></i> Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>  
                  <th>Category</th>   
                  <th>Author</th>            
                  <th>Status</th>            
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($post as $res)
                      <tr>
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{ $res->title }}</td>
                          <td>
                              @foreach($res->categories as $category)
                              {{ $category->name }} |
                              @endforeach
                          </td>
                          <td>{{ $res->user->name }}</td>
                          <td>
                          @if($res->status == 1)
                            Publish
                          @else
                            Draft
                          @endif
                           </td>
                          <td>
                          <a href="{{ route('post.edit', $res->id) }}" class="btn btn-warning"><span class="fa fa-edit">&nbsp;</span> Edit</a>
                          <form style="display:inline-block" action="{{ route('post.destroy', $res->id )}}" method="post">
                              {{ csrf_field() }}                    
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Hapus Data?')"><span class="fa fa-trash">&nbsp;</span>Delete</button>
                          </form>
                          </td>
                      </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>#</th>
                  <th>Name</th>  
                  <th>Category</th>   
                  <th>Author</th>            
                  <th>Status</th>            
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
    
</script>
@endsection


