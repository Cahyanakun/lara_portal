@extends('frontend.layouts.app')

@section('main')
<section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <h1 class="mb-4">{{ $berita->title }}</h1>
            <div class="post-meta">
                @foreach($berita->categories as $cat)
                        <a href="{{ route('category', $cat->id) }}"><span class="category" style="margin-right:5px;">{{ $cat->name }}</span></a>
                @endforeach
                        <span class="mr-2">{{ $berita->created_at->diffForHumans() }} </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> {{ $berita->comments()->count()}}</span>
                      </div>
            <div class="post-content-body">
                {!! htmlspecialchars_decode($berita->body) !!}
            </div>

             <div class="pt-5">
              <h3 class="mb-5">{{ $berita->comments()->count()}} Comments</h3>
              <ul class="comment-list">
                @if(session('message'))
                    <div class="alert alert-primary">
                        {{ session('message') }}
                    </div>
                @endif
              @foreach($berita->comments as $comment)
                <li class="comment">
                  <div class="vcard">
                    <img src="{{ $comment->user->image }}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{ $comment->user->name }}</h3>
                    <div class="meta">{{ $comment->created_at->diffForHumans() }}</div>
                    <p>{{ $comment->body }}</p>
                    @if(Auth::check())
                      @if($comment->user->id == auth()->user()->id)
                      <a class="btn btn-outline-info btn-xs"  data-toggle="modal" href='#{{ $comment->id}}'>Edit</a>
                      <div class="modal fade" id="{{ $comment->id }}">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-body">
                                      <form action="{{ route('comment.update', $comment->id)}}" method="post"  class="p-5 bg-light">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                          <div class="form-group">
                                            <label for="message">Message</label>
                                            <input name="body" id="message" class="form-control" value="{{ $comment->body }}">
                                          </div>
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Comments</button>
                                          </div>
                                      </form>
                                  </div>
                              </div>
                         </div>
                      </div>
                      <form style="display:inline-block"action="{{ route('comment.destroy', $comment->id )}}" method="post">
                              {{ csrf_field() }}                    
                              <input name="_method" type="hidden" value="DELETE">
                              <input class="btn btn-outline-danger btn-xs" type="submit" onclick="return confirm('Yakin Hapus Data?')" value="Delete">
                      </form>                
                      @endif
                    @endif
                  
                    <p style="margin-top:5px"> 
                      <form action="{{ route('replycomment.store', $comment->id)}}" method="post"  class="p-2">
                        {{ csrf_field() }}
                          <div class="form-group">
                            <label for="message">Message</label>
                            <input name="body" id="message" class="form-control">
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary">Reply Comments</button>
                          </div>
                        </form>
                    </p>
                  </div>

                 
                  <ul class="children">
                  @foreach($comment->comments as $reply)
                    <li class="comment">
                      <div class="vcard">
                        <img src="{{ $reply->user->image }}" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3>{{ $reply->user->name }}</h3>
                        <div class="meta">{{ $reply->created_at->diffForHumans() }}</div>
                        <p>{{ $reply->body }}</p>
                        @if(Auth::check())
                          @if($reply->user->id == auth()->user()->id)
                        <a class="btn btn-outline-info btn-xs" data-toggle="modal" href='#{{ $reply->id}}'>Edit</a>
                          <div class="modal fade" id="{{ $reply->id }}">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                  <div class="modal-body">
                                      <form action="{{ route('comment.update', $reply->id)}}" method="post"  class="p-5 bg-light">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                          <div class="form-group">
                                            <label for="message">Message</label>
                                            <input name="body" id="message" class="form-control" value="{{ $reply->body }}">
                                          </div>
                                          <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Edit Comments</button>
                                          </div>
                                      </form>
                                  </div>  
                              </div>
                          </div>
                        </div>
                        <form style="display:inline-block" action="{{ route('comment.destroy', $reply->id )}}" method="post">
                              {{ csrf_field() }}                    
                              <input name="_method" type="hidden" value="DELETE">
                              <input class="btn btn-outline-danger btn-xs" type="submit" onclick="return confirm('Yakin Hapus Data?')" value="Delete">
                        </form>
                        @endif
                      @endif
                      </div>
                    </li>
                  @endforeach
                  </ul>
                </li>                     
              @endforeach
              </ul>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-1">
                <h3 class="mb-3">Leave a comment</h3>
                <form action="{{ route('threadcomment.store', $berita->id)}}" method="post"  class="p-4 bg-light">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" id="message" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Comments</button>
                  </div>
                </form>

                </form>
              </div>
            </div>

          </div>

          <!-- END main-content -->

         

         @include('frontend.layouts.sidebar')
         

        </div>
      </div>
    </section>
    @endsection