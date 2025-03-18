
@extends('layouts.web')
@section('content')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Sign Up</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active">Sign Up</li>
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
<section class="section-padding-80 white" id="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
                <div class="box-panel">
                    <form class="row g-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name*</label>
                            <input name="name" type="text" placeholder="Your Full Name" class="@error('name') is-invalid @enderror form-control" required="true">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email*</label>
                            <input name="email" type="email" placeholder="Your Email" class="@error('email') is-invalid @enderror form-control" required="true">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input name="password" type="password" placeholder="Your Password" class="@error('password') is-invalid @enderror form-control" required="true">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password*</label>
                            <input type="password" name="password_confirmation" placeholder="Verify Your Password" class="form-control" required="true">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-12 text-right">
                                    <p class="help-block"><a data-toggle="modal" href="{{ url('/login') }}">Already Register Sing In</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">Create Account</button>
                    </form>
                    <!-- form login -->
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
@endsection
