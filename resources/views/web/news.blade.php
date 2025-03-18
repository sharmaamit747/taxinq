
@extends('layouts.web')
@section('content')
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Latest News</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">News</li>
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

            <!-- Left Side Content -->
            <div class="col-sm-12 col-xs-12 col-md-8">

                <!-- Blog Masonry Grid -->
                <div id="posts-masonry" class="posts-masonry" style="position: relative; height: 2712.13px;">
                    @foreach($news as $val)
                    <div class="col-xs-12 col-sm-12 col-md-6  col-lg-6" style="position: absolute; left: 0px; top: 0px;">
                        <div class="blog-grid">
                            <div class="blog-image">
                                <img alt="{{ $val->title }}" class="img-responsive" src="{{ url($val->pic) }}">
                            </div>
                            <div class="blog-content">
                                <h5><a href="{{ url('news-single/'.$val->slug) }}">{{ $val->title }}</a></h5>
                                <ul class="post-meta">
                                    <li>By {{ $val->author }}</li>
                                    <li>{{ $val->tags }}</li>
                                    <li>{{ $val->dates }}</li>
                                </ul>
                            </div>
                            <div class="blog-footer">
                                <ul class="like-comment">
                                    <li><a href="#"><i class="icon-heart"></i>23</a>
                                    </li>
                                    <li><a href="#"><i class="icon-chat"></i>{{ $val->count }}</a>
                                    </li>
                                </ul>
                                <a href="{{ url('news-single/'.$val->slug) }}" class="more-btn pull-right">
                                    <i class="fa fa-long-arrow-right"></i> MORE
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
                <!-- Blog Masonry Grid -->

                <!-- Pagination -->
                <div class="text-center  section-padding-40">
                    {{ $news->links() }}
                </div>

                <div class="clearfix"></div>
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
                                @foreach($news as $val)
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
                        <div class="archive">
                            <h2>Archives</h2>
                            <hr class="widget-separator no-margin">
                            <ul>
                                <li><a href="#">August 2016</a> <span>13</span>
                                </li>
                                <li><a href="#">July 2016</a> <span>23</span>
                                </li>
                                <li><a href="#">June 2016 </a><span>322</span>
                                </li>
                                <li><a href="#">May 2016  </a><span>12</span>
                                </li>
                                <li><a href="#">April 2014 </a><span>333</span>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- widget end -->

                    <!-- widget -->
                    <div class="widget">
                        <div class="recent-comments">
                            <h2>Recent Comments</h2>
                            <hr class="widget-separator no-margin">
                            <ul id="recentcomments">
                                <li class="recentcomments"> <span class="comment-author-link">John Doe</span> on <a href="">bootstrap vs foundation</a> </li>
                                <li class="recentcomments"> <span class="comment-author-link">Emily Copper</span> on <a href="">how to get data from URL in PHP</a> </li>
                                <li class="recentcomments"> <span class="comment-author-link">Alex Martin</span> on <a href="">My SQL PHP Multi Layer Drop Down List from Databse</a> </li>
                                <li class="recentcomments"> <span class="comment-author-link">Tina Martin</span> on <a href="">PHP Multi Layer Drop Down List from Databse</a> </li>

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
                                <a href="#.">Hair</a>
                                <a href="#.">Waxing</a>
                                <a href="#.">Body</a>
                                <a href="#.">Oil</a>
                                <a href="#.">Facials</a>
                                <a href="#.">Cutting</a>

                                <a href="#.">Blowouts</a>
                                <a href="#.">Curling</a>
                                <a href="#.">Makeup</a>
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
