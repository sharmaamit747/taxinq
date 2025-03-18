
<?php $__env->startSection('content'); ?>
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Contact Us</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="active">Contact</li>
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

<!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Contact Us  =-=-=-=-=-=-= -->
<section class="section-padding-80 white contact-us" id="contacts">
    <div class="container">
        <div class="message"></div>
        <div class="row">
            <div class="col-sm-8 col-sm-8 col-xs-12">

                <h2>Send a Message</h2>

                <form id="contactForm" class="smooth-submit" method="post" action="<?php echo e(url('contact-submit')); ?>">
                    <div class="row">
                        <div class="col-lg-6 formmargin">

                            <div class="form-group">
                                <input type="text" placeholder="Name" id="name" name="name" class="form-control" required="true">

                            </div>

                            <div class="form-group">
                                <input type="email" placeholder="Email" id="email" name="email" class="form-control" required="true">

                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Subject" id="subject" name="subject" class="form-control" required="">
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <textarea cols="12" rows="8" placeholder="Message..." id="message" name="message" class="form-control" required="true"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button id="yes" class="btn btn-primary" type="submit">Send Message</button>

                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12 contact-detail">

                <h2>Contact Details</h2>

                <div class="contact-info">
                    <ul class="cont-info">
                        <li><span class="icon fa fa-map-marker"></span> <?php echo e((new \App\Library\Contents)->content()->address); ?></li>
                        <li><span class="icon fa fa-phone"></span> <?php echo e((new \App\Library\Contents)->content()->contact); ?></li>
                        <li><span class="icon fa fa-map-marker"></span> <?php echo e((new \App\Library\Contents)->content()->email); ?></li>
                        <li><span class="icon fa fa-fax"></span> 011-43632575</li>
                    </ul>
                    <div class="social-links-two clearfix">
                        <a class="facebook img-circle" href="<?php echo e((new \App\Library\Contents)->content()->facebook_id); ?>">
                            <span class="fa fa-facebook-f"></span>
                        </a>
                        <a class="twitter img-circle" href="<?php echo e((new \App\Library\Contents)->content()->twitter_id); ?>">
                            <span class="fa fa-twitter"></span>
                        </a>
                        <a class="google-plus img-circle" mailto="<?php echo e((new \App\Library\Contents)->content()->email); ?>">
                            <span class="fa fa-google-plus"></span>
                        </a>
                        <a class="linkedin img-circle" href="#">
                            <span class="fa fa-pinterest-p"></span>
                        </a>
                        <a class="linkedin img-circle" href="<?php echo e((new \App\Library\Contents)->content()->linkedin_id); ?>">
                            <span class="fa fa-linkedin"></span>
                        </a>
                    </div>
                </div>
                <!-- end links -->

            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Contact Us End =-=-=-=-=-=-= -->



<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/web/contact.blade.php ENDPATH**/ ?>
