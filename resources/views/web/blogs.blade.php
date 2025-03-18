
@extends('layouts.web')
@section('content')
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Latest Blogs & Post</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Blog</li>
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
        <!-- Row -->
        <div class="row">
            <!-- Blog Masonry Grid -->
            <div id="posts-masonry" class="posts-masonry" style="position: relative; height: 1999.97px;">
                @foreach($blog as $val)
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="position: absolute; left: 0px; top: 0px;">
                    <div class="blog-grid">
                        <div class="blog-image"> <img alt="blog-image1" class="img-responsive" src="{{ url($val->pic) }}"> </div>
                        <div class="blog-content">
                            <h5>
                                <a href="{{ url('blog/'.$val->slug) }}">
                                    {{ $val->title }}
                                </a>
                            </h5>
                            <ul class="post-meta">
                                <li>By {{ $val->author }}</li>
                                <li>{{ $val->catName }}</li>
                                <li>{{ $val->dates }}</li>
                            </ul>
                            <p>
                                {!! $val->con !!}
                            </p>
                        </div>
                        <div class="blog-footer">
                            <ul class="like-comment">
                                <li><a href="#"><i class="icon-heart"></i>23</a>
                                </li>
                                <li><a href="#"><i class="icon-chat"></i>{{ $val->count }}</a>
                                </li>
                            </ul>
                            <a href="{{ url('blog/'.$val->slug) }}" class="more-btn pull-right">
                                <i class="fa fa-long-arrow-right"></i> MORE
                            </a> 
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Blog Masonry Grid -->
            <div class="clearfix"></div>
            <div class="text-center clearfix section-padding-40"> 
                {{ $blog->links() }}
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>

@endsection
