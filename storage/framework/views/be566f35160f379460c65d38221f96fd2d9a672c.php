
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
                <h4 class="page-title">Create E-Book</h4>
            </div>
            <div class="col-lg-3 text-right ">
                <a href="<?php echo e(url('admin/ebook')); ?>" class="btn btn-outline-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <form id="add_ebook" class="smooth-submit" method="post" action="<?php echo e(url('admin/add_ebook')); ?>">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="name">E-book Title*</label>
                                    <input type="text" required="true" class="form-control" id="" name="title">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="name">E-book Price*</label>
                                    <input type="number" required="true" class="form-control" id="" name="price">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="name">E-book Discount Price*</label>
                                    <input type="number" required="true" class="form-control" id="" name="dprice">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <div class="form-group">
                                    <label for="name">Author*</label>
                                    <input type="text" required="true" class="form-control" id="" name="author">
                                </div>
                            </div>
                            <div class="col-lg-4 p-2">
                                <label for="name">Upload E-book</label><br/>
                                <input id="blog_img_input1" required="true" name="file1" type="file">
                                <br/>
                            </div>
                            <div class="col-lg-4 p-2">
                                <label for="name">E-book Feature Image*</label><br/>
                                <input id="blog_img_input" required="true" name="file" onchange="$('#blog_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                <br/><img class="pt-2" style="width:150px; height: 150px; object-fit: contain;" src="" id="blog_image">
                            </div>
                            
                            <div class="col-lg-12 p-2">
                                <label for="name">Description</label>
                                   
                                <textarea class="form-control" name="description" id="editorpok11"></textarea>
                            </div>
                            <div class="col-lg-12 p-2">
                                <label for="name">Specification</label>
                                   
                                <textarea class="form-control" name="specification" id="editorpok12"></textarea>
                            </div>
                            
                            
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



<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharma\resources\views/admin/ebook/create_ebook.blade.php ENDPATH**/ ?>
