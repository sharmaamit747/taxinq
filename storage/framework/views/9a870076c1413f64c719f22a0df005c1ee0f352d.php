
<?php $__env->startSection('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">Testimonial</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-0">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add-new-testimonial"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered responsive testimonial_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Picture</th>
                                        <th>Title</th>
                                        <th>Message</th>
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
<div class="modal fade" id="add-new-testimonial" tabindex="-1" role="dialog" aria-labelledby="add-new-testimonial" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_testimonial" class="smooth-submit" method="post" action="create_testimonial">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Author Title*</label>
                                    <input required="true" type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="customRange21">Rating</label>
                                    <input type="range" class="form-range" min="0" max="5" id="customRange21" name="subject">
                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Message</label>
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <input id="category_img_input" name="file" onchange="$('#category_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                            </div>
                            <div class="col-lg-6 p-2">
                                <img style="width:150px; height: 150px; object-fit: contain;" src="" id="category_image">
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
    </div>
</div>

<div class="modal fade" id="edit-testimonial" tabindex="-1" role="dialog" aria-labelledby="edit-testimonial" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Category</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_testimonial" enctype="multipart/form-data" class="smooth-submit" method="post" action="edit_testimonial">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Author Title*</label>
                                    <input type="hidden" class="form-control" value="" id="testimonial_id" name="id">
                                    <input type="text" required="true" class="form-control" value="" id="testimonial_name" name="title">
                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="customRange2">Rating</label>
                                    <input value="1" type="range" class="form-range" min="0" max="5" id="customRange2" name="subject">
                                </div>
                            </div>
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Message</label>
                                    <textarea id="testimonial_message" class="form-control" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 p-2">
                                <input type="hidden" class="form-control" value="" id="ucategory_old" name="old">
                                <input id="ucategory_img_input" name="file" onchange="$('#ucategory_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                            </div>
                            <div class="col-lg-6 p-2">
                                <img style="width:150px; height: 150px; object-fit: contain;" src="" id="ucategory_image">
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
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\taxinq\resources\views/admin/setting/testimonial.blade.php ENDPATH**/ ?>
