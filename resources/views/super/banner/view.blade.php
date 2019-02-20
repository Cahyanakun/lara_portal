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
              <h3 class="box-title">Data Banner</h3>
              <a onclick="addForm()" class="btn btn-primary pull-right modal-show" title="Create User"><i class="fa fa-plus-circle"></i> Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="datatable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>                
                  <th>Status</th> 
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>#</th>
                  <th>Title</th>    
                  <th>Status</th> 
                  <th>Photo</th>
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

@include('super.banner.form')


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

    var table = $('#datatable').DataTable({
                    processing: true,
                    ServerSide: true,
                    ajax: "{{ route('api.banner') }}",
                    columns: [
                      {data: 'id', name: 'id'},
                      {data: 'title', name: 'title'},
                      {data: 'status', name: 'status'},
                      {data: 'show_photo', name: 'show_photo'},
                      {data: 'action', name: 'action', orderable:false, searchable:false}
                    ]
                });

      function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Buat Banner');
      }

      function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('banner') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Banner');

            $('#id').val(data.id);
            $('#title').val(data.title);
            $('#body').val(data.body);           
        
          },
          error : function() {
              alert("Nothing Data");
          }
        });
      }

      // function showData(id) {
      //   $('.modal-title').text('Add Category');
      //   $('.modal-btn-save').addClass('hide');

      //    $.ajax({
      //         url: "{{ url('category') }}" + '/' + id,
      //         type: "GET",
      //         dataType: 'html',
      //         success: function (response) {
      //             $('.modal-body').html(response);
      //         }
      //     });
      //     $('.modal').modal('show');
      // }

      function deleteData(id){
          var popup = confirm("Apakah Yakin Hapus Data");
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          if (popup == true) {
            $.ajax({
              url : "{{ url('banner') }}" + '/' + id,
              type : "POST",
              data : {'_method' : 'DELETE', '_token' : csrf_token},
              success : function(data) {
                  table.ajax.reload();
                  swal({
                          title: 'Success!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                  })
              }, 
              error : function() {
                    swal({
                          title: 'Oops...',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
              }
            })
          } 
        }

        $(function(){
            $('#modal-form form').on('submit', function (e) {
                e.preventDefault();
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('banner') }}";
                    else url = "{{ url('banner') . '/' }}" + id;
                    var forms = $('#modal-form form');

                    forms.find('.help-block').remove();
                    forms.find('.col-md-6').removeClass('has-error');

                    $.ajax({
                        url : url,
                        type : "POST",
//                        data : $('#modal-form form').serialize(),
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Success!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(xhr){
                            var res = xhr.responseJSON;
                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function (key, value) {
                                    $('#' + key)
                                        .closest('.col-md-6')
                                        .addClass('has-erorr')
                                        .append('<span class="help-block"><strong>' + value +'</strong></span>')
                                });
                            }  
                        }
                    });
                    return false;
            });
        });

</script>
@endsection


