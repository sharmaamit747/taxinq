
@extends('layouts.admin')
@section('content')
<style>
    div#cke_editorpok {
        width: 100%;
    }    
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">Consultants</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-header">
                        <div class="row m-0">
                            <div class="col-lg-12 text-right">
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#add-new-consultants"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="" class="table table-bordered responsive consultants_table" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>Picture</th>
                                        <th>Title</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
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
<div class="modal fade" id="add-new-consultants" tabindex="-1" role="dialog" aria-labelledby="add-new-consultants" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-plus-circle" aria-hidden="true"></i> add new</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="create_consultants" class="smooth-submit" method="post" action="create_consultants">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Consultant Name*</label>
                                    <input required="true" type="text" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Email*</label>
                                    <input required="true" type="email" class="form-control" name="email">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Mobile*</label>
                                    <input required="true" type="text" class="form-control" name="extra1">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Title*</label>
                                    <input required="true" type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Facebook ID</label>
                                    <input type="text" class="form-control" name="facebook">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Twitter ID</label>
                                    <input type="text" class="form-control" name="twitter">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Linkedin ID</label>
                                    <input type="text" class="form-control" name="linkedin">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Instagram ID</label>
                                    <input type="text" class="form-control" name="instagram">
                                </div>
                            </div>
                            <div class="col-lg-9 p-2">
                                <div class="form-group">
                                    <label for="name">About Consultant</label>
                                    <textarea class="form-control" id="editorcon" name="about"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="name">Profile picture*</label>
                                <input required="true" id="category_img_input" name="file" onchange="$('#category_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url('images/no.png') }}" id="category_image">
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

<div class="modal fade" id="edit-consultants" tabindex="-1" role="dialog" aria-labelledby="edit-consultants" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-pencil-square" aria-hidden="true"></i> Edit Consultant</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit_consultants" enctype="multipart/form-data" class="smooth-submit" method="post" action="edit_consultants">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Consultant Name*</label>
                                    <input type="hidden" class="form-control" value="" id="consultants_id" name="id">
                                    <input type="text" required="true" class="form-control" value="" id="consultants_name" name="name">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Mobile*</label>
                                    <input required="true" id="consultants_mobile" type="text" class="form-control" name="extra1">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Title*</label>
                                    <input required="true" id="consultants_title" type="text" class="form-control" name="title">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Facebook ID</label>
                                    <input type="text" value="" id="consultants_facebook" class="form-control" name="facebook">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Twitter ID</label>
                                    <input type="text" value="" id="consultants_twitter" class="form-control" name="twitter">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Linkedin ID</label>
                                    <input type="text" value="" id="consultants_linkedin" class="form-control" name="linkedin">
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <div class="form-group">
                                    <label for="name">Instagram ID</label>
                                    <input type="text" value="" id="consultants_instagram" class="form-control" name="instagram">
                                </div>
                            </div>
                            <div class="col-lg-9 p-2">
                                <div class="form-group">
                                    <label for="name">About Consultant</label>
                                    <textarea class="form-control" id="consultants_about" name="about"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-3 p-2">
                                <label for="name">Profile Picture</label>
                                <input type="hidden" class="form-control" value="" id="ucategory_old" name="old">
                                <input id="ucategory_img_input" name="file" onchange="$('#ucategory_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url('images/no.png') }}" id="ucategory_image">
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
@endsection
