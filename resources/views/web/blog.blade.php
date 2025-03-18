
@extends('layouts.web')
@section('content')
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>{{ $blog->title }}</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('blogs') }}">Blog</a></li>
                        <li class="active"><a href="{{ url('#') }}">{{ $blog->title }}</a></li>
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
                        <img alt="blog-image1" class="img-responsive blog-image1" src="{{ url($blog->pic) }}">
                    </div>
                    <div class="blog-content">
                        <h5>
                            <a href="{{ url('blog/'.$blog->slug) }}">
                                {{ $blog->title }}
                            </a>
                        </h5>
                        <ul class="post-meta">
                            <li>By {{ $blog->author }}</li>
                            <li>{{ $blog->catName }}</li>
                            <li>{{ $blog->dates }}</li>
                        </ul>
                    </div>
                    {!! $blog->content !!}
                    <div class="clearfix"></div>

                    <div class="entry-footer">
                        <div class="post-admin">
                            <i class="icon-profile-male"></i>Posted by<a href="#">{{ $blog->author }}</a>
                        </div>
                        <div class="tags">
                            <i class="fa fa-tags"></i>
                            @foreach($blog->tags as $val)
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
                                            <input type="hidden" value="blog" name="type" class="form-control" required="true">
                                            <input type="hidden" value="{{ $blog->id }}" name="blog_id" class="form-control" required="true">
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
                                @foreach($blog1 as $val)
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

                    <!-- widget -->
                    <div class="widget">
                        <div class="category">
                            <h2>Category</h2>
                            <hr class="widget-separator no-margin">
                            <ul>
                                @foreach($category as $val)
                                <li><a href="{{ url('blog-category/'.$val->slug) }}">{{ $val->title }} </a> <span>{{ $val->totalcat }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- widget end -->


                    <!-- widget -->
                    <div class="widget">
                        <div class="widget_tag_cloud">
                            <h2>Tags cloud</h2>
                            <hr class="widget-separator no-margin">
                            <div class="tag_cloud">
                                @foreach($tag as $val)
                                <a href="{{ url('blog-tag/'.$val->tag) }}">{{ $val->tag }}</a>
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
