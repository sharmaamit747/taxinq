
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
                <h4 class="page-title">Create News</h4>
            </div>
            <div class="col-lg-3 text-right">
                <a href="<?php echo e(url('admin/news')); ?>" class="btn btn-outline-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form id="edit_newss" class="smooth-submit" method="post" action="<?php echo e(url('admin/edit_newss')); ?>">
            <div class="form-body">
                <div class="modal-body">
                    <div class="row m-0 p-2">
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <input type="hidden" class="form-control" value="<?php echo e($res->id); ?>" name="id">
                                <label for="name">Title*</label>
                                <input required="true" type="text" class="form-control" value="<?php echo e($res->title); ?>" id="" name="title">
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="form-group">
                                <label for="name">Author*</label>
                                <input required="true" type="text" class="form-control" value="<?php echo e($res->author); ?>" id="" name="author">
                            </div>
                        </div>
                        <div class="col-lg-12 p-2">
                            <div class="form-group">
                                <label for="">Tags</label>
                                <input type="text" class="formtag form-control" name="tags[]" data-role="tagsinput" placeholder="jQuery,Script,Net" value="<?php echo e($res->tags); ?>">
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
                            <label for="name">Description</label>

                            <textarea class="form-control" name="blogg" id="editorpok"><?php echo e($res->content); ?></textarea>
                        </div>

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


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/admin/news/edit_news.blade.php ENDPATH**/ ?>
