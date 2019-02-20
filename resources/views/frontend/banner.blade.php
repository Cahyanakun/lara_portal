@extends('frontend.layouts.app')

@section('main')
<section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4">{{ $berita->title }}</h1>
            <div class="post-meta">
                        <span class="mr-2">{{ $berita->created_at->diffForHumans() }} </span> &bullet;
                      </div>
            <div class="post-content-body">
                {!! htmlspecialchars_decode($berita->body) !!}
            </div>
          </div>

          <!-- END main-content -->

         

         @include('frontend.layouts.sidebar')
         

        </div>
      </div>
    </section>
    @endsection