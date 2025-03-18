
@extends('layouts.web')
@section('content')
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-7 co-xs-12 text-left">
                <h1>Sign In To Your Account</h1>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-sm-5 co-xs-12 text-right">
                <div class="bread">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li class="active">Sign In</li>
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
            <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                <div class="box-panel">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email*</label>
                            <input name="email" required="true" type="email" placeholder="Your Email" class="@error('email') is-invalid @enderror form-control">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password*</label>
                            <input name="password" required="true" type="password" placeholder="Your Password" class="@error('password') is-invalid @enderror form-control">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="checkbox flat-checkbox">
                                        <label>
                                            <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                                            <span class="fa fa-check"></span> Remember me?
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <p class="help-block"><a data-toggle="modal" href="#myModal">Forgot password?</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-lg btn-block">Log In</button>
                    </form>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


@endsection
