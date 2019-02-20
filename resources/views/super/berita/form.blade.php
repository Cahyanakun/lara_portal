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
<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Buat Berita/News Portal</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div>
          @if (count($errors) > 0)
              @foreach ($errors->all() as $error)
              <p class="alert alert-danger">{{ $error }}</p>
              @endforeach
            @endif
          </div>
          <div class="row">
            <div class="col-md-6">
           
            <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">

              {{ csrf_field()}}

              <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" required>
    
              </div>
              <div class="form-group">
                <label>Sub Title</label>
                <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle') }}" required>
    
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Cover Image</label>
                <input type="file" name="image" id="image" class="form-control" required value="{{ old('image') }}">
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <label>Category</label>
                <select name="categories[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Category"
                        style="width: 100%;" required>
                  @foreach($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endforeach
                </select>
              </div>
              <!-- /.form-group -->
              <div class="form-group">
                <label>Opsi</label>
                  <select name="status" class="form-control{{$errors->has('status') ? ' is-invalid' : '' }}" name="status" value="{{ old('status') }}" required>
                     <option value="">Opsi...</option>
                     <option value="1" @if(old('status') == '1') selected="slected" @endif>Publish</option>
                     <option value="2" @if(old('status') == '2') selected="slected" @endif>Draft</option>
                  </select>
                
              </div>
              <!-- /.form-group -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
  
  
            <div class="box-body pad">
                <textarea name="body" id="editor1"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('body') }}</textarea>
                         
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>

         

          </form>
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
<!-- Select2 -->
<script src="{{ asset('users/select2/dist/js/select2.full.min.js')}}"></script>
<!-- ck edior -->
<script src="{{ asset('users/ckeditor/ckeditor.js')}}"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
<script>
     //Initialize Select2 Elements
    // $('#category').select2();
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
    $(function() {
      $('.select2').select2(); 

      CKEDITOR.replace('editor1', options);
    });

</script>
@endsection