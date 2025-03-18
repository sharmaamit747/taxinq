
<?php $__env->startSection('content'); ?>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">E-Books</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-0">
                            <div class="col-lg-12 text-right">
                                <a href="create_ebook" class="btn btn-outline-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered responsive ebook_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Pic</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Disc Price</th>
                                        <th>E-Book</th>
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

<div class="modal fade" id="upload-book" tabindex="-1" role="dialog" aria-labelledby="upload-book">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-plus-circle" aria-hidden="true"></i> add E-Book PDF</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form id="upload_book" class="smooth-submit" method="post" action="upload_book">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <input type="hidden" class="form-control" value="1" id="bk_id" name="id">
                                <input type="hidden" class="form-control" value="" id="bk_old" name="olds">
                                <input id="bk_img_input" name="file" accept=".pdf" type="file">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-lg-12">
                        <button class="btn btn-danger float-right" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary float-right">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\pharma\resources\views/admin/ebook/ebooks.blade.php ENDPATH**/ ?>
