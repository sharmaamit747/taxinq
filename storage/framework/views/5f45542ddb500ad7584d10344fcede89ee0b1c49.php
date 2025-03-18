
<?php $__env->startSection('content'); ?>
<style>
    div#cke_editorpok {
        width: 100%;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">Create Blog</h4>
            </div>
            <div class="col-lg-3 text-right">
                <a href="<?php echo e(url('admin/blog')); ?>" class="btn btn-outline-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form id="edit_blogss" class="smooth-submit" method="post" action="<?php echo e(url('admin/edit_blogss')); ?>">
            <div class="form-body">
                <div class="modal-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?php echo e($res->id); ?>" name="id">
                                <label for="name">Category*</label>
                                <select required="true" class="form-control" name="bcategory">
                                    <option disabled> Select Blog Category </option>
                                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val->id); ?>" <?php if($res->category_id == $val->id): ?> selected <?php endif; ?>><?php echo e($val->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <label for="name">Blog Title*</label>
                                <input required="true" type="text" class="form-control" value="<?php echo e($res->title); ?>" id="" name="btitle">
                            </div>
                        </div>
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <label for="name">Blog Author*</label>
                                <input required="true" type="text" class="form-control" value="<?php echo e($res->author); ?>" id="" name="author">
                            </div>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="tags[]" class="form-select" id="multiple-tag2-field" data-placeholder="Choose anything" multiple>
                                    <?php $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if(in_array($val->tag, explode(',',$res->tag_id))): ?> selected <?php endif; ?>><?php echo e($val->tag); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <input type="hidden" class="form-control" value="<?php echo e($res->pic); ?>" id="blog_old" name="old">
                            <input id="blog_img_input" name="file" onchange="$('#blog_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                        </div>
                        <div class="col-lg-6 p-2">
                            <?php if($res->pic == null || $res->pic == ''): ?>
                            <img style="width:150px; height: 150px; object-fit: cover;" src="<?php echo e(url('images/no.png')); ?>" id="blog_image">
                            <?php else: ?>
                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url($res->pic)); ?>" id="blog_image">
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-12 p-2">
                            <label for="name">Blog</label>

                            <textarea class="form-control" name="blogg" id="editorpok"><?php echo e($res->content); ?></textarea>
                        </div>

                        <!--                            <div class="col-lg-6 p-2">
                                                        <div class="form-group">
                                                            <label><?php echo e(__('messages.Parent Category')); ?></label>
                                                            <select class="form-control browsers" name="parent_id">
                        
                                                            </select>
                                                        </div>
                                                    </div>-->

                    </div>
                </div>
                <div class="modal-footer col-lg-12">
                    <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Cancel</button>
                    <button  class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Row-->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/admin/blog/blog_edit.blade.php ENDPATH**/ ?>
