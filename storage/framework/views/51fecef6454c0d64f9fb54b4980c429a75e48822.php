
<?php $__env->startSection('content'); ?>
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1><?php echo e($news->title); ?></h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li><a href="<?php echo e(url('news')); ?>">News</a></li>
                        <li class="active"><a href="<?php echo e(url('#')); ?>"><?php echo e($news->title); ?></a></li>
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
                        <img alt="blog-image1" class="img-responsive blog-image1" src="<?php echo e(url($news->pic)); ?>">
                    </div>
                    <div class="blog-content">
                        <h5>
                            <a href="<?php echo e(url('news/'.$news->slug)); ?>">
                                <?php echo e($news->title); ?>

                            </a>
                        </h5>
                        <ul class="post-meta">
                            <li>By <?php echo e($news->author); ?></li>
                            <li><?php echo e($news->dates); ?></li>
                        </ul>
                    </div>
                    <?php echo $news->content; ?>

                    <div class="clearfix"></div>

                    <div class="entry-footer">
                        <div class="post-admin">
                            <i class="icon-profile-male"></i>Posted by<a href="#"><?php echo e($news->author); ?></a>
                        </div>
                        <div class="tags">
                            <i class="fa fa-tags"></i>
                            <?php $__currentLoopData = $news->tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#"><?php echo e($val); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div class="blog-section">
                        <div class="blog-heading">
                            <h2>leave your comment </h2>
                            <hr>
                        </div>
                        <div class="commentform">
                            <form method="post" action="<?php echo e(url('add_comment')); ?>" class="smooth-submit" id="add_comment">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span>
                                            </label>
                                            <input type="hidden" value="news" name="type" class="form-control" required="true">
                                            <input type="hidden" value="<?php echo e($news->id); ?>" name="blog_id" class="form-control" required="true">
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
                            <h2>Comments (<?php echo e($ccount); ?>)</h2>
                            <hr>
                        </div>
                        <ol class="comment-list">
                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="comment">
                                <div class="comment-info">
                                    <img class="pull-left hidden-xs img-circle" src="<?php echo e(url('assetsweb/images/authors/7.jpg')); ?>" alt="author">
                                    <div class="author-desc">
                                        <div class="author-title">
                                            <strong><?php echo e($val->name); ?></strong>
                                            <ul class="list-inline pull-right">
                                                <li><a href="#"><?php echo e($val->dates); ?></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p><?php echo e($val->message); ?></p>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <?php $__currentLoopData = $news1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="post">
                                    <figure class="post-thumb">
                                        <img alt="" src="<?php echo e(url($val->pic)); ?>">
                                    </figure>
                                    <h4><a href="<?php echo e(url('blog/'.$val->slug)); ?>"><?php echo e($val->title); ?></a></h4>
                                    <div class="post-info"><?php echo e($val->dates); ?></div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yantramonline/public_html/taxinq.com/resources/views/web/news_single.blade.php ENDPATH**/ ?>
