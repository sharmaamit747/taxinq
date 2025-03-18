
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pharma\resources\views/admin/ebook/ebooks.blade.php ENDPATH**/ ?>
