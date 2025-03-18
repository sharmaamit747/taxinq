
@extends('layouts.web')
@section('content')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 col-xs-12 text-left">
                <h1>Appointment ID: <span class="text-primary">{{ $res->slug }}</span></h1>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('client/home') }}">Home</a>
                        </li>
                        <li><a href="{{ url('client/appointments') }}">Appointments</a>
                        </li>
                        <li class="active">{{ $res->slug }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="page-title white">
    <div class="container">
        <div class="card radius-15">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-lg-4"><h1 class="text-center"><b>Query Type:</b></h1><h4 class="text-center"> {{ $res->qtitle }}</h4></div>
                            <div class="col-12 col-lg-4"><h1 class="text-center"><b>Law:</b></h1><h4 class="text-center"> {{ $res->ltitle }}</h4></div>
                            @if($res->consultant_id == null)
                            <div class="col-12 col-lg-4"><h1 class="text-center"><b>Consultant:</b></h1><h4 class="text-center"> --Not Allocated--</h4></div>
                            @else
                            <div class="col-12 col-lg-4"><h1 class="text-center"><b>Consultant:</b></h1><h4 class="text-center"> {{ $res->cname }}</h4></div>
                            @endif
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
</section>

<section class="white question-tabs padding-bottom-80" id="latest-post">
    <div class="container">
        <div class="row">
            <!-- Content Area Bar -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs text-center">
                            <li class="active"> 
                                <a data-toggle="tab" href="#tab1">
                                    <i class="icofont icon-documents"></i>
                                    <span class="hidden-xs">Query Description</span>
                                </a> 
                            </li>
                            <li>
                                <a data-toggle="tab" href="#tab2">
                                    <i class="icofont icon-envelope"></i>
                                    <span class="hidden-xs">Email Chat</span>
                                </a> 
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane active">
                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        @if($res->extra1 != null && $res->extra1 != '')
                                            <a href="{{ url($res->extra1) }}" class="btn btn-secondary ms-auto radius-10">
                                                <img src="{{ url('images/att.png') }}"><br/> Download<br/> Attachment
                                            </a>
                                        @endif
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h2>Appointment Description</h2>
                                        
                                        <p style="color:#000;">{{ $res->message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab-pane">
                            <div class="card shadow-none border mb-0 radius-15">
                                <div class="card-body">
                                    <div class="row m-0">
                                        <h4 class="mb-0 col-lg-8 p-0">Communication With Client</h4>
                                        <p class="mb-0 ms-sm-3 text-muted col-lg-3  text-right">
                                            <a id="chat-btn" pid="{{ $rid }}" data-toggle="modal" data-target="#email-chat" href="#" class="btn btn-primary btn-small navbar-btn compose-mail-btn">
                                                <i class="bx bx-plus me-2"></i> Compose
                                            </a>
                                        </p>
                                        <input type="hidden" id="allote-con" value="{{ $rid }}" />
                                    </div>
                                    <div class="row m-0 mt-3">
                                        <div class="table-responsive">
                                            <table id="" class="table table-bordered responsive chatemail_table" style="width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Sender Name</th>
                                                        <th>Message</th>
                                                        <th>Date Time</th>
                                                        <th>View</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->
</section>

<div class="modal fade" id="email-chat" tabindex="-1" role="dialog" aria-labelledby="email-chat" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form id="email_chat" enctype="multipart/form-data" class="smooth-submit" method="post" action="{{ url('admin/email_chat') }}">
            <div class="modal-content border-primary">
                <div class="modal-header bg-primary  p-3">
                    <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-envelope-o" aria-hidden="true"></i> Message with Email</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <input id="appointmentId" required="true" type="hidden" value="{{ $rid }}" class="form-control" name="appointment_id">
                <div class="modal-body  p-3">
                    <div class="email-form row">
                        <div class="mb-3 col-lg-8">
                            <label for="name">Send To*</label>
                            <select name="email[]" class="chat-select" required="true" data-placeholder="Send To" multiple="multiple">
                                @foreach($email as $key => $val)
                                <option value="{{ $val }}">{{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-0 col-lg-3">
                            <label for="name">Attach Files</label><br/>
                            <input title="Attachment" type="file" name="files[]" multiple>
                        </div>
                        <div class="mb-3 col-lg-8">
                            <label for="name">Subject*</label>
                            <input id="extraid" name="extraid" type="hidden" class="form-control" value="{{ time() }}">
                            <input name="subject" required="true" type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="mb-3 col-lg-8">
                            <textarea name="message" class="form-control" placeholder="Message" rows="12" cols="10"></textarea>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer  p-3">
                    <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Cancel</button>
                    <button  class="btn btn-primary float-right">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="view-chmessage" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="row modal-footer-p p-3">

            </div>
        </div>
    </div>
</div>
@endsection
