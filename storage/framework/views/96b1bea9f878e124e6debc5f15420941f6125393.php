
<?php $__env->startSection('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">General Settings</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <form id="generalsave" class="smooth-submit" method="post" action="<?php echo e(url('admin/generalsave')); ?>">
                            <div class="form-body">
                                <div class="modal-body">
                                    <div class="row m-0 p-2">
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">App Name</label>
                                                <input value="<?php echo e($find->app_name); ?>" type="text" class="form-control" name="app_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input value="<?php echo e($find->email); ?>" type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Contact</label>
                                                <input  value="<?php echo e($find->contact); ?>" type="text" class="form-control" name="contact">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Facebook</label>
                                                <input  value="<?php echo e($find->facebook_id); ?>" type="text" class="form-control" name="facebook_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Twitter</label>
                                                <input value="<?php echo e($find->twitter_id); ?>" type="text" class="form-control" name="twitter_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Instagram</label>
                                                <input value="<?php echo e($find->instagram_id); ?>" type="text" class="form-control" name="instagram_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Linkedin</label>
                                                <input value="<?php echo e($find->linkedin_id); ?>" type="text" class="form-control" name="linkedin_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Youtube</label>
                                                <input value="<?php echo e($find->youtube_id); ?>" type="text" class="form-control" name="youtube_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 p-2">
                                            <div class="form-group">
                                                <label for="name">Address</label>
                                                <input value="<?php echo e($find->address); ?>" type="text" class="form-control" name="address">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">Main Logo</label>
                                            <input id="category_img_input" name="logo" onchange="$('#category_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            <?php if($find->logo == '' || $find->logo == null): ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url('images/no.png')); ?>" id="category_image">
                                            <?php else: ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url($find->logo)); ?>" id="category_image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">White Logo</label>
                                            <input id="category_img_input1" name="wlogo" onchange="$('#category_image1').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            <?php if($find->wlogo == '' || $find->wlogo == null): ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url('images/no.png')); ?>" id="category_image1">
                                            <?php else: ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url($find->wlogo)); ?>" id="category_image1">
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">Favicon</label>
                                            <input id="category_img_input11" name="favicon" onchange="$('#category_image11').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            <?php if($find->wlogo == '' || $find->wlogo == null): ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url('images/no.png')); ?>" id="category_image11">
                                            <?php else: ?>
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url($find->favicon)); ?>" id="category_image11">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer col-lg-12">
                                    <button  class="btn btn-primary float-right">Save & Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/admin/setting/general.blade.php ENDPATH**/ ?>
