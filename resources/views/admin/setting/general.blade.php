
@extends('layouts.admin')
@section('content')
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12 col-lg-3">
                <h4 class="page-title">General Settings</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <form id="generalsave" class="smooth-submit" method="post" action="{{ url('admin/generalsave')}}">
                            <div class="form-body">
                                <div class="modal-body">
                                    <div class="row m-0 p-2">
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">App Name</label>
                                                <input value="{{ $find->app_name }}" type="text" class="form-control" name="app_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Email</label>
                                                <input value="{{ $find->email }}" type="email" class="form-control" name="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Contact</label>
                                                <input  value="{{ $find->contact }}" type="text" class="form-control" name="contact">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Facebook</label>
                                                <input  value="{{ $find->facebook_id }}" type="text" class="form-control" name="facebook_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Twitter</label>
                                                <input value="{{ $find->twitter_id }}" type="text" class="form-control" name="twitter_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Instagram</label>
                                                <input value="{{ $find->instagram_id }}" type="text" class="form-control" name="instagram_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Linkedin</label>
                                                <input value="{{ $find->linkedin_id }}" type="text" class="form-control" name="linkedin_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 p-2">
                                            <div class="form-group">
                                                <label for="name">Youtube</label>
                                                <input value="{{ $find->youtube_id }}" type="text" class="form-control" name="youtube_id">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 p-2">
                                            <div class="form-group">
                                                <label for="name">Address</label>
                                                <input value="{{ $find->address }}" type="text" class="form-control" name="address">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">Main Logo</label>
                                            <input id="category_img_input" name="logo" onchange="$('#category_image').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            @if($find->logo == '' || $find->logo == null)
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url('images/no.png') }}" id="category_image">
                                            @else
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url($find->logo) }}" id="category_image">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">White Logo</label>
                                            <input id="category_img_input1" name="wlogo" onchange="$('#category_image1').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            @if($find->wlogo == '' || $find->wlogo == null)
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url('images/no.png') }}" id="category_image1">
                                            @else
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url($find->wlogo) }}" id="category_image1">
                                            @endif
                                        </div>
                                        <div class="col-lg-3 p-2">
                                            <label for="name">Favicon</label>
                                            <input id="category_img_input11" name="favicon" onchange="$('#category_image11').attr('src', window.URL.createObjectURL(this.files[0]))" type="file">
                                            @if($find->wlogo == '' || $find->wlogo == null)
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url('images/no.png') }}" id="category_image11">
                                            @else
                                            <img style="width:150px; height: 150px; object-fit: contain;" src="{{ url($find->favicon) }}" id="category_image11">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer col-lg-12">
                                    <button  class="btn btn-primary float-right">Save & Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End Row-->

@endsection
