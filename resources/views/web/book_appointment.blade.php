
@extends('layouts.web')
@section('content')
<!-- =-=-=-=-=-=-= Page Breadcrumb =-=-=-=-=-=-= -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Book Appointment</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="active">Book Appointment</li>
                    </ol>
                </div>
                <!-- end bread -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</section>

<!-- =-=-=-=-=-=-= Page Breadcrumb End =-=-=-=-=-=-= -->

<!-- =-=-=-=-=-=-= Post Question  =-=-=-=-=-=-= -->
<section class="section-padding-80 white" id="post-question">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="box-panel">
                    <h2>Book Appointment</h2>
                    <p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque. </p>
                    <hr>
                    @if(session()->has('message'))
                    <div class="row message"> {{ session()->get('message') }}</div>
                    @endif
                    
                    <form  enctype="multipart/form-data" method="post" id="appoitment-book" action="{{ url('appoitment-book') }}" class="margin-top-40">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Your Name*</label>
                                    <input @if(Auth::user() != null) value="{{ Auth::user()->name }}" readonly="true" @endif required="true" type="text" name="your_name" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input @if(Auth::user() != null) value="{{ Auth::user()->email }}" readonly="true" @endif required="true" type="email" name="email" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Mobile*</label>
                                    <input maxlength="10" @if(Auth::user() != null) value="{{ Auth::user()->extra1 }}" readonly="true" @endif required="true" title="Please enter valid phone number" pattern="[6789][0-9]{9}" type="text" name="mobile" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Law</label>
                                    <select class="select-law form-control" name="law_id">
                                        <option value="">Select Law</option>
                                        @foreach($laws as $val)
                                        <option value="{{ $val->id }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select Query Type</label>
                                    <select class="select-query form-control" name="query_id">
                                        <option value="">Select Query Type</option>
                                        @foreach($query as $val)
                                        <option value="{{ $val->id }}">{{ $val->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Select File(Only pdf ,docx ,xlsx is acceptable)</label>
                                    <input accept=".pdf ,.docx ,.xlsx" type="file" name="file" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Give Brief about the case</label>
                                    <textarea cols="12" rows="5" placeholder="Post Your Case Details Here....." id="message" name="message" class="form-control"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button class="btn btn-primary pull-right">Send Request</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Blog Right Sidebar End -->
            <div class="clearfix"></div>
        </div>
    </div>
    <!-- end container -->
</section>
<!-- =-=-=-=-=-=-= Post QuestionEnd =-=-=-=-=-=-= -->




@endsection
