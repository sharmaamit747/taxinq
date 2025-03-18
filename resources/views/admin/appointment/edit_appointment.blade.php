
@extends('layouts.admin')
@section('content')
<style>
    div#cke_editorpok {
        width: 100%;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="row pt-2 pb-2">
            <div class="col-sm-9">
                <h4 class="page-title">View Appointments</h4>
            </div>
            <div class="col-lg-3 text-right">
                <a href="{{ url('admin/appointments') }}" class="btn btn-outline-primary"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back</a>
            </div>
        </div>
        <div class="user-profile-page">
            <div class="card radius-15">
                <div class="card-body">
                    <div class="row">
                        <p class="mb-0 ms-sm-12 text-muted col-lg-12  text-right">
                            <a id="allote-con" pid="{{ $rid }}" data-bs-toggle="modal" data-bs-target="#allote-consultant" href="#" class="btn btn-primary ms-auto radius-10">
                                Allot Consultant
                            </a>
                        </p>
                        <div class="col-12 col-lg-6">
                            <table class="table table-sm table-borderless mt-md-0 mt-3">
                                <tbody>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $res->your_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $res->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Mobile:</th>
                                        <td>{{ $res->mobile }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-lg-6">
                            <table class="table table-sm table-borderless mt-md-0 mt-3">
                                <tbody>
                                    <tr>
                                        <th>Query Type:</th>
                                        <td>{{ $res->qtitle }}</td>
                                    </tr>
                                    <tr>
                                        <th>Law:</th>
                                        <td>{{ $res->ltitle }}</td>
                                    </tr>
                                    <tr>
                                        <th>Consultant:</th>
                                        @if($res->consultant_id == null)
                                        <td id="allote-consultss">--Not Allocated--</td>
                                        @else
                                        <td id="allote-consultss">{{ $res->cname }}</td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr/>
                    <!--end row-->
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#Experience">
                                <span class="p-tab-name">Description</span>
                                <i class="bx bx-donate-blood font-24 d-sm-none"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#Biography">
                                <span class="p-tab-name">Email Chat</span>
                                <i class="bx bxs-user-rectangle font-24 d-sm-none"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3">
                        <div class="tab-pane fade show active" id="Experience">
                            <div class="card shadow-none border mb-0 radius-15">
                                <div class="card-body">
                                    <div class="row m-0">
                                        <h4 class="mb-0 col-lg-8 p-0">Appointment Description</h4>
                                        @if($res->extra1 != null && $res->extra1 != '')
                                        <p class="mb-0 ms-sm-3 text-muted col-lg-3  text-right">
                                            <a href="{{ url($res->extra1) }}" class="btn btn-secondary ms-auto radius-10">
                                                Download Attachment
                                            </a>
                                        </p> 
                                        @endif
                                    </div>
                                    <div class="row m-0 mt-3">
                                        {{ $res->message }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Biography">
                            <div class="card shadow-none border mb-0 radius-15">
                                <div class="card-body">
                                    <div class="row m-0">
                                        <h4 class="mb-0 col-lg-8 p-0">Communication With Client</h4>
                                        <p class="mb-0 ms-sm-3 text-muted col-lg-3  text-right">
                                            <a id="chat-btn" pid="{{ $rid }}" data-bs-toggle="modal" data-bs-target="#email-chat" href="#" class="btn btn-secondary compose-mail-btn">
                                                <i class="bx bx-plus me-2"></i> Compose
                                            </a>
                                        </p>
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
        </div>
    </div>
</div><!-- End Row-->

<div class="modal fade" id="allote-consultant" tabindex="-1" role="dialog" aria-labelledby="allote-consultant" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-primary">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-plus-circle" aria-hidden="true"></i> Allot Consultant</h5>
                <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="allote_consultant" class="smooth-submit" method="post" action="{{ url('admin/allote_consultant') }}">
                <div class="form-body">
                    <div class="modal-body">
                        <div class="row m-0 p-2">
                            <div class="col-lg-12 p-2">
                                <div class="form-group">
                                    <label for="name">Select Consultant*</label>
                                    <input id="appointmentId" required="true" type="hidden" value="{{ $rid }}" class="form-control" name="id">
                                    <select id="allote-consult" class="form-control" name="consultant_id">
                                        <option value="">--Select Consultant--</option>
                                        @foreach($consultant as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-lg-12">
                        <button type="button" class="btn btn-danger float-right" data-bs-dismiss="modal">Cancel</button>
                        <button  class="btn btn-primary float-right">Allot</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="email-chat" tabindex="-1" role="dialog" aria-labelledby="email-chat" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen" role="document">
        <form id="email_chat" enctype="multipart/form-data" class="smooth-submit" method="post" action="{{ url('admin/email_chat') }}">
            <div class="modal-content border-primary">
                <div class="modal-header bg-primary  p-3">
                    <h5 class="modal-title text-white" id="allowance-deduction"><i class="fa fa-envelope-o" aria-hidden="true"></i> Message with Email</h5>
                    <button type="button" class="close text-white" data-bs-dismiss="modal" aria-label="Close">
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
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="row modal-footer-p p-3">

            </div>
        </div>
    </div>
</div>
@endsection
