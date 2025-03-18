
<?php $__env->startSection('content'); ?>
<style>
    div#cke_editorpok {
        width: 100%;
    }
</style>
<section id="user-profile" class="user-profile parallex">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12 col-sm-12">
                <div class="profile-sec ">
                    <div class="profile-head">
                        <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                            <div class="profile-avatar">
                                <span>
                                    <?php if(Auth::user()->pic != null && Auth::user()->pic != ''): ?>
                                    <img class="img-responsive img-circle" alt="" src="<?php echo e(url(Auth::user()->pic)); ?>">
                                    <?php else: ?>
                                    <img class="img-responsive img-circle" alt="" src="<?php echo e(url('assetsweb/images/demo1.png')); ?>">
                                    <?php endif; ?>
                                </span>
                                <div class="profile-name">
                                    <h3><?php echo e(Auth::user()->name); ?></h3>
                                    <i><?php echo e(Auth::user()->title); ?></i>
                                    <ul class="social-btns">
                                        <li><a href="<?php echo e(Auth::user()->facebook); ?>" title=""><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li><a href="<?php echo e(Auth::user()->instagram); ?>" title=""><i class="fa fa-instagram"></i></a>
                                        </li>
                                        <li><a href="<?php echo e(Auth::user()->twitter); ?>" title=""><i class="fa fa-twitter"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-6 no-padding">
                            <ul class="profile-count">
                                <li>171<i>Followers</i>
                                </li>
                                <li>13,725<i>Experience</i>
                                </li>
                                <li>120<i>Questions</i>
                                </li>
                            </ul>
                            <ul class="profile-connect">
                                <li><a title="" href="#">Follow</a>
                                </li>
                                <li><a title="" href="#">Hire Me</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding-80" id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <div class="box-panel">
                    <form method="post" class="smooth-submit" id="profile-pic-update" action="<?php echo e(url('profile-pic-update')); ?>">
                        <div class="form-group">
                            <label>Upload Image</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-default btn-file">
                                        Browse… <input name="file" type="file" id="imgInp">
                                    </span>
                                </span>
                                <input type="text" class="form-control" readonly="">
                            </div>
                            <?php if(Auth::user()->pic != null && Auth::user()->pic != ''): ?>
                            <img id="img-upload" src="<?php echo e(url(Auth::user()->pic)); ?>" alt="">
                            <?php else: ?>
                            <img id="img-upload" src="<?php echo e(url('assetsweb/images/demo1.png')); ?>" alt="">
                            <?php endif; ?>
                        </div>
                        <button class="btn btn-primary btn-lg">Change Image</button>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box-panel">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item active" role="presentation">
                            <a class="nav-link" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">General Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Education</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Password</a>
                        </li>
                    </ul>
                    <hr/>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade active in" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <form method="post" class="smooth-submit" id="profile-intro-update" action="<?php echo e(url('profile-intro-update')); ?>">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Your Name*</label>
                                            <input value="<?php echo e(Auth::user()->name); ?>" required="true" name="name" type="text" placeholder="John Doe" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Birthday</label>
                                            <input value="<?php echo e(Auth::user()->extra2); ?>" type="date" name="birthday" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Mobile*</label>
                                            <input required="true" value="<?php echo e(Auth::user()->extra1); ?>" type="number" name="phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Facebook ID</label>
                                            <input value="<?php echo e(Auth::user()->facebook); ?>" type="text" class="form-control" name="facebook">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Twitter ID</label>
                                            <input value="<?php echo e(Auth::user()->twitter); ?>" type="text" class="form-control" name="twitter">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Linkedin ID</label>
                                            <input value="<?php echo e(Auth::user()->linkedin); ?>" type="text" class="form-control" name="linkedin">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group">
                                            <label>Instagram ID</label>
                                            <input value="<?php echo e(Auth::user()->instagram); ?>" type="text" class="form-control" name="instagram">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Headline</label>
                                            <input value="<?php echo e(Auth::user()->title); ?>" type="text" name="title" placeholder="Team Leader at IotTech Softwares" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>About You</label>
                                            <textarea id="editorcon" name="about" rows="6" placeholder="" class="form-control"><?php echo e(Auth::user()->about); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg">Update My Profile</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <form method="post" id="profile-edu-update" action="<?php echo e(url('profile-edu-update')); ?>" class="smooth-submit repeaters form-border-1">
                                <div class="col-sm-12 col-xxl-6 mb-5"  data-repeater-list="group-address">
                                    <?php $__currentLoopData = $edu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card rounded-4 mb-3" data-repeater-item="">
                                        <div class="positions">
                                            <button title="Delete" val="<?php echo e($val->id); ?>" type="button" data-repeater-delete class="delTime btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="card-body p-7">
                                            <div class="row gx-9">
                                                <div class="col-lg-12 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase">School*</label>
                                                    <input value="<?php echo e($val->id); ?>" class="form-control" type="hidden" name="id">
                                                    <input value="<?php echo e($val->school); ?>" class="form-control" type="text" placeholder="Type here" required="true" name="school">
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Degree*</label>
                                                    <input value="<?php echo e($val->degree); ?>" class="form-control" type="text" placeholder="Type here" required="true" name="degree">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Field of study*</label>
                                                    <input value="<?php echo e($val->fos); ?>" class="form-control" type="text" placeholder="Type here" required="true" name="fos">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Completion Year*</label>
                                                    <select required="true" class="form-control" name="year" placeholder="--Select Year--">
                                                        <option>--Select Year--</option>
                                                        <?php for($i = 1960; $i < 2025; $i++): ?>
                                                        <option <?php if($i == $val->year): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card rounded-4 mb-3" data-repeater-item="">
                                        <div class="positions">
                                            <button title="Delete" val="" type="button" data-repeater-delete class="delTime btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="card-body p-7">
                                            <div class="row gx-9">
                                                <div class="col-lg-12 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase">School*</label>
                                                    <input value="" class="form-control" type="hidden" name="id">
                                                    <input value="" class="form-control" type="text" placeholder="Type here" required="true" name="school">
                                                </div>
                                                <div class="col-lg-12 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Degree*</label>
                                                    <input value="" class="form-control" type="text" placeholder="Type here" required="true" name="degree">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Field of study*</label>
                                                    <input value="" class="form-control" type="text" placeholder="Type here" required="true" name="fos">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="mb-1 fs-13px ls-1 fw-semibold text-uppercase" for="city">Completion Year*</label>
                                                    <select required="true" class="form-control" name="year" placeholder="--Select Year--">
                                                        <option>--Select Year--</option>
                                                        <?php for($i = 1960; $i < 2025; $i++): ?>
                                                        <option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                                        <?php endfor; ?>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-lg-6 mb-5">
                                        <button type="button" class="btn btn-secondary float-right" data-repeater-create>
                                            <i class="fa fa-plus"></i> Add New Education
                                        </button>
                                    </div>
                                    <div class="col-lg-6 mb-5 text-right d-flex flex-wrap justify-content-sm-end">
                                        <button class="btn btn-primary" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <form method="post" class="smooth-submit" id="pass-update" action="<?php echo e(url('pass-update')); ?>">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Password*</label>
                                            <input value="" required="true" name="password" type="password" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label>Confirm Password*</label>
                                            <input value="" required="true" type="password" name="password_confirmation" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-lg">Update My Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/client/profile.blade.php ENDPATH**/ ?>
