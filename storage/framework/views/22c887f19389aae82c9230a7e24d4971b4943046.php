
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
            <div class="col-lg-3 text-right ">
                <a href="<?php echo e(url('admin/blog')); ?>" class="btn btn-outline-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form id="create_blog" class="smooth-submit" method="post" action="<?php echo e(url('admin/create_blogss')); ?>">
            <div class="form-body">
                <div class="modal-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <label for="name">Category*</label>
                                <select  required="true" class="form-control" name="bcategory">
                                    <option selected disabled> Select Blog Category </option>
                                    <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($val->id); ?>"><?php echo e($val->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <label for="name">Blog Title*</label>
                                <input type="text" required="true" class="form-control" id="" name="btitle">
                            </div>
                        </div>
                        <div class="col-lg-4 p-2">
                            <div class="form-group">
                                <label for="name">Blog Author*</label>
                                <input type="text" required="true" class="form-control" id="" name="author">
                            </div>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="btag[]" class="form-select" id="multiple-tag-field" data-placeholder="Choose anything" multiple>
                                    <?php $__currentLoopData = $tag; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($val->tag); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <input id="blog_img_input" name="file" onchange="$('#blog_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                        </div>
                        <div class="col-lg-6 p-2">
                            <img style="width:150px; height: 150px; object-fit: contain;" src="<?php echo e(url('images/no.png')); ?>" id="blog_image">
                        </div>
                        <div class="col-lg-12 p-2">
                            <label for="name">Blog</label>

                            <textarea class="form-control" name="blogg" id="editorpok"></textarea>
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
                    <button  class="btn btn-primary float-right">Create</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- End Row-->


<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yantramonline/public_html/taxinq.com/resources/views/admin/blog/blogsadd.blade.php ENDPATH**/ ?>
