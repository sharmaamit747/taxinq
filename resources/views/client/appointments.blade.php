
@extends('layouts.web')
@section('content')
<style>
    div#cke_editorpok {
        width: 100%;
    }
</style>
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 col-xs-12 text-left">
                <h1>Appointments</h1>
            </div>
            <div class="col-md-6 col-sm-5 col-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="{{ url('client/home') }}">Home</a>
                        </li>
                        <li><a href="#">Client</a>
                        </li>
                        <li class="active">Appointments</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="white question-tabs padding-bottom-80" id="latest-post">
    <div class="container">
        <div class="row">
            <!-- Content Area Bar -->
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel-body">
                    <div class="tab-content">
                        <div id="tab1" class="tab-pane active">
                            @foreach($res as $val)
                            <div class="listing-grid">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 hidden-xs">
                                        <a data-toggle="tooltip" data-placement="bottom" data-original-title="" href="#">
                                            <img alt="" class="img-responsive center-block" src="{{ url('assetsweb/images/4624216.png')}}">
                                        </a>
                                    </div>
                                    <div class="col-md-7 col-sm-8  col-xs-12">
                                        <h3><a href="{{ url('client/appointment/'.$val->slug) }}"> {{ $val->qtitle .' Under '. $val->ltitle }}</a></h3>
                                        <div class="listing-meta"> <span><i class="fa fa-clock-o" aria-hidden="true"></i>{{ $val->dates }}</span>  <span><i class="fa fa fa-eye" aria-hidden="true"></i> 750 Views</span> 
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-2 col-xs-12">
                                        <ul class="question-statistic">
                                            <li class="active">
                                                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Answers"><span>2</span></a> 
                                            </li>
                                            <li>
                                                <a data-toggle="tooltip" data-placement="bottom" data-original-title="Votes"><span>0</span></a> 
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-10 col-sm-10  col-xs-12">
                                        <p>
                                            {!! $val->message !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>  
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>

@endsection
