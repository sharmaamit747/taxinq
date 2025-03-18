
<?php $__env->startSection('content'); ?>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Sign Up</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active">Sign Up</li>
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
<section class="section-padding-80 white" id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
                <div class="box-panel">
                    <form class="row g-3" method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label>Name*</label>
                            <input name="name" type="text" placeholder="Your Full Name" class="<?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> form-control" required="true">
                            <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input name="email" type="email" placeholder="Your Email" class="<?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> form-control" required="true">
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input name="password" type="password" placeholder="Your Password" class="<?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?> form-control" required="true">
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" name="password_confirmation" placeholder="Verify Your Password" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <p class="help-block"><a data-toggle="modal" href="<?php echo e(url('/login')); ?>">Already Register Sing In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">Create Account</button>
                    </form>
                    <!-- form login -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yantramonline/public_html/taxinq.com/resources/views/auth/register.blade.php ENDPATH**/ ?>
