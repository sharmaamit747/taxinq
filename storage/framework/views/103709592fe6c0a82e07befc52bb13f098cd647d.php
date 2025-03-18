
<?php $__env->startSection('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">Blogs</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-0">
                            <div class="col-lg-12 text-right">
                                <a href="create_blog" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered responsive blog_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Pic</th>
                                        <th>Title</th>
                                        <th>Blog</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->
<div class="modal fade" id="add-new-blog" tabindex="-1" role="dialog" aria-labelledby="add-new-blog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new Blog </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_blog" class="smooth-submit" method="post" action="create_blog">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Category</label>
                                    <select class="form-control" name="bcategory">
                                        <option selected disabled> Select Blog Category </option>
                                        <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($val->id); ?>"><?php echo e($val->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label for="name">Blog Title</label>
                                    <input type="text" class="form-control" id="" name="btitle">
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <input id="blog_img_input" name="file" onchange="$('#blog_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                            </div>
                            <div class="col-lg-6 p-2">
                                <img style="width:150px; height: 150px; object-fit: cover;" src="<?php echo e(url('images/no.png')); ?>" id="blog_image">
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
                        <button  class="btn btn-danger float-right" data-dismiss="modal"><?php echo e(__('messages.Cancel')); ?></button>
                        <button  class="btn btn-primary float-right"><?php echo e(__('messages.Create')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-blogtag" tabindex="-1" role="dialog" aria-labelledby="edit-blogtag" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Tag </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_blogtag" enctype="multipart/form-data" class="smooth-submit" method="post" action="edit_blogtag">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Tag</label>
                                    <input type="hidden" class="form-control" value="" id="tag_id" name="id">
                                    <input type="text" class="form-control" value="" id="tag_name" name="tag">
                                </div>
                            </div>
<!--                            <div class="col-lg-6 p-2">
                                <div class="form-group">
                                    <label><?php echo e(__('messages.Parent Category')); ?></label>
                                    <select class="form-control browsersa" name="parent_id">

                                    </select>
                                </div>
                            </div>-->
                            
                            
                        </div>
                    </div>
                    <div class="modal-footer col-lg-12">
                        <button  class="btn btn-danger float-right" data-dismiss="modal"><?php echo e(__('messages.Cancel')); ?></button>
                        <button  class="btn btn-primary float-right"><?php echo e(__('messages.Update')); ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/yantramonline/public_html/taxinq.com/resources/views/admin/blog/blogs.blade.php ENDPATH**/ ?>
