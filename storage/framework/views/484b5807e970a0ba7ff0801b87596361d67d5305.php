
<?php $__env->startSection('content'); ?>
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Our Services</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="active"><a href="#">Our Services</a></li>
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

<section class="custom-padding white" id="how-it-work">
    <div class="container">
        <!-- title-section -->
        <div class="main-heading text-center">
            <h2>OUR SERVICES </h2>
            <div class="slices"><span class="slice"></span><span class="slice"></span><span class="slice"></span>
            </div>
            <p>Explore Our SERVICES</p>
        </div>
        <div class="row">
            <div class="col-sm-4 col-md-4 col-xs-12  center-responsive">
                <img src="<?php echo e(url('assetsweb/images/gst.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/gst')); ?>">GST</a></h4>
                <p class="text-body">GST is a unified tax system that replaced multiple indirect taxes levied by both the Central and State Governments.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/custom.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/customs')); ?>">CUSTOMS</a></h4>
                <p class="text-body">the tax imposed on goods when they are transported across international borders.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/income.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/income-tax')); ?>">INCOME TAX</a></h4>
                <p class="text-body">An income tax is a tax imposed on individuals or entities in respect of the income or profits earned by them. </p>
            </div>
            <div class="clearfix"></div>
            <div class="col-sm-4 col-md-4 col-xs-12  center-responsive">
                <img src="<?php echo e(url('assetsweb/images/corporation.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/corporation-tax')); ?>">CORPORATION TAX</a></h4>
                <p class="text-body">A corporate tax is a tax on the profits or net income of a corporation. Corporate tax is paid on a company's taxable income which includes company's revenue after deductions.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/pf.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/pf-esi')); ?>">PF & ESI</a></h4>
                <p class="text-body">The Government of India established the ESI scheme to provide workers with financial, medical, and other benefits.</p>
            </div>
            <div class="col-sm-4 col-md-4 col-xs-12 center-responsive get-arrow">
                <img src="<?php echo e(url('assetsweb/images/labour.png')); ?>" class="img-responsive" alt="">
                <h4><a href="<?php echo e(url('services/labor-law')); ?>">LABOUR LAW</a></h4>
                <p class="text-body">Labour law also known as employment law is the body of laws, administrative rulings, and precedents which address the legal rights of, and restrictions. </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->
</section>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/web/services/services.blade.php ENDPATH**/ ?>
