
@extends('layouts.web')
@section('content')
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>{{ $news->title }}</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('news') }}">News</a></li>
                        <li class="active"><a href="{{ url('#') }}">{{ $news->title }}</a></li>
                    </ol>
                </div>
                <!-- end bread -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<section id="blog" class="custom-padding white">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-8">
                <div class="blog-detial">
                    <div class="blog-image">
                        <img alt="blog-image1" class="img-responsive blog-image1" src="{{ url($news->pic) }}">
                    </div>
                    <div class="blog-content">
                        <h5>
                            <a href="{{ url('news/'.$news->slug) }}">
                                {{ $news->title }}
                            </a>
                        </h5>
                        <ul class="post-meta">
                            <li>By {{ $news->author }}</li>
                            <li>{{ $news->dates }}</li>
                        </ul>
                    </div>
                    {!! $news->content !!}
                    <div class="clearfix"></div>

                    <div class="entry-footer">
                        <div class="post-admin">
                            <i class="icon-profile-male"></i>Posted by<a href="#">{{ $news->author }}</a>
                        </div>
                        <div class="tags">
                            <i class="fa fa-tags"></i>
                            @foreach($news->tag as $val)
                            <a href="#">{{ $val }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="blog-section">
                        <div class="blog-heading">
                            <h2>leave your comment </h2>
                            <hr>
                        </div>
                        <div class="commentform">
                            <form method="post" action="{{ url('add_comment') }}" class="smooth-submit" id="add_comment">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span>
                                            </label>
                                            <input type="hidden" value="news" name="type" class="form-control" required="true">
                                            <input type="hidden" value="{{ $news->id }}" name="blog_id" class="form-control" required="true">
                                            <input type="text" name="name" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span>
                                            </label>
                                            <input type="email" name="email" class="form-control" required="true">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <label>Comment <span class="required">*</span>
                                            </label>
                                            <textarea name="message" class="form-control"  required="true" rows="4" cols="6"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 margin-top-20 clearfix">
                                        <button type="submit" class="btn btn-primary">Post Your Comment</button>
                                    </div>
                                </div> 
                            </form>
                            <div class="message"></div>
                        </div>
                    </div>
                    
                    <div class="clearfix"></div>

                    <div class="blog-section">
                        <div class="blog-heading">
                            <h2>Comments ({{ $ccount }})</h2>
                            <hr>
                        </div>
                        <ol class="comment-list">
                            @foreach($comment as $val)
                            <li class="comment">
                                <div class="comment-info">
                                    <img class="pull-left hidden-xs img-circle" src="{{ url('assetsweb/images/authors/7.jpg') }}" alt="author">
                                    <div class="author-desc">
                                        <div class="author-title">
                                            <strong>{{ $val->name }}</strong>
                                            <ul class="list-inline pull-right">
                                                <li><a href="#">{{ $val->dates }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p>{{ $val->message }}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ol>

                    </div>

                    <div class="clearfix"></div>

                    
                </div>

                <!-- Blog Grid -->



                
                <!-- Pagination End -->
            </div>
            <!-- Left Content End -->

            <!-- Blog Right Sidebar -->
            <div class="col-sm-12 col-xs-12 col-md-4">
                <!-- sidebar -->
                <div class="side-bar">
                    <!-- widget -->
                    <div class="widget">
                        <div class="latest-news">
                            <h2>Latest News</h2>
                            <hr class="widget-separator no-margin">
                            <div class="news-post">
                                @foreach($news1 as $val)
                                <div class="post">
                                    <figure class="post-thumb">
                                        <img alt="" src="{{ url($val->pic) }}">
                                    </figure>
                                    <h4><a href="{{ url('blog/'.$val->slug) }}">{{ $val->title }}</a></h4>
                                    <div class="post-info">{{ $val->dates }}</div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- widget end -->
                </div>
                <!-- sidebar end -->

            </div>
            <!-- Blog Right Sidebar End -->

        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>

@endsection
