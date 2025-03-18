
<?php $__env->startSection('content'); ?>
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
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
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
                <?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="position: absolute; left: 0px; top: 0px;">
                    <div class="blog-grid">
                        <div class="blog-image"> <img alt="blog-image1" class="img-responsive" src="<?php echo e(url($val->pic)); ?>"> </div>
                        <div class="blog-content">
                            <h5>
                                <a href="<?php echo e(url('blog/'.$val->slug)); ?>">
                                    <?php echo e($val->title); ?>

                                </a>
                            </h5>
                            <ul class="post-meta">
                                <li>By <?php echo e($val->author); ?></li>
                                <li><?php echo e($val->catName); ?></li>
                                <li><?php echo e($val->dates); ?></li>
                            </ul>
                            <p>
                                <?php echo $val->con; ?>

                            </p>
                        </div>
                        <div class="blog-footer">
                            <ul class="like-comment">
                                <li><a href="#"><i class="icon-heart"></i>23</a>
                                </li>
                                <li><a href="#"><i class="icon-chat"></i><?php echo e($val->count); ?></a>
                                </li>
                            </ul>
                            <a href="<?php echo e(url('blog/'.$val->slug)); ?>" class="more-btn pull-right">
                                <i class="fa fa-long-arrow-right"></i> MORE
                            </a> 
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Blog Masonry Grid -->
            <div class="clearfix"></div>
            <div class="text-center clearfix section-padding-40"> 
                <?php echo e($blog->links()); ?>

            </div>
            <div class="clearfix"></div>
        </div>
        <!-- Row End -->
    </div>
    <!-- end container -->
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yantramonline/public_html/taxinq.com/resources/views/web/blogs.blade.php ENDPATH**/ ?>
