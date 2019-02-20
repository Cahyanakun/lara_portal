
  <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">{{ $dosen->name }}</h3>
              <h3 class="widget-user-desc">
                  @if($dosen->jenis_kelamin == "Laki-Laki")
                    <i class="fa fa-mars"></i>
                  @elseif($dosen->jenis_kelamin == "Perempuan")
                    <i class="fa fa-venus"></i>
                  @else
                    <i class="fa fa-intersex"></i>
                  @endif

              </h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="{{ $dosen->image }}" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><i class="fa fa-phone"></i></h5>
                    <span class="description-text">{{ $dosen->phone}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><i class="fa fa-circle-o">&nbsp;</i><i class="fa fa-circle">&nbsp;</i><i class="fa fa-circle-o"></i></h5>
                    <span class="description-text">{{ $dosen->NI }}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><i class="fa fa-envelope"></i></h5>
                    <span class="description-text">{{ $dosen->email}}</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="box-body">
              <blockquote>
                <p>{{ $dosen->quotes }}</p>
                <small><cite title="Source Title">Quotes Of Life</cite></small>
              </blockquote>
              </div>
             
            
          </div>