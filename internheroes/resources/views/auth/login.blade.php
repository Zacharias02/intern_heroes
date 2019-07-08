@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Login')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3  col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <div class="userccount auth">
                    <div class="userbtns">
                        <ul class="nav nav-tabs">
                            <?php
                            $c_or_e = old('candidate_or_employer', 'candidate');
                            ?>
                            <li class="{{($c_or_e == 'candidate')? 'active':''}} candidate"><a data-toggle="tab" href="#candidate" aria-expanded="true"><span class="tab-title">{{__('Apply for internship')}}</span></a></li>
                            <li class="{{($c_or_e == 'employer')? 'active':''}} employer"><a data-toggle="tab" href="#employer" aria-expanded="false"><span class="tab-title">{{__('Hire an applicant')}}</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="candidate" class="formpanel tab-pane fade {{($c_or_e == 'candidate')? 'active in':''}}">
                            <div class="socialLogin">
                                <h5 class="text-uppercase">{{__('Log in using')}}</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('login/jobseeker/facebook')}}" class="fb btn-block">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <span>Facebook</span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('login/jobseeker/twitter')}}" class="tw btn-block">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <span>Twitter</span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('login/jobseeker/google')}}" class="gp btn-block">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            <span>Google</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-divider text-uppercase"><span>{{__('Or')}}</span></h5>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                <div class="formpanel">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <label>{{__('Email Address')}}</label>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" name="password" value="" required>
                                        <label>{{__('Password')}}</label>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                        <span class="show-password toggle-password" toggle="#password"></span>
                                    </div>         
                                    <div class="row">    
                                        <div class="col-md-6">
                                            <input type="submit" class="signin btn btn-secondary round btn-block" value="{{__('Sign in')}}">
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <div class="forgotpassword">
                                                <a href="{{ route('password.request') }}">{{__('Forgot Password')}}?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- login form  end--> 
                            </form>
                            <!-- sign up form -->
                            <div class="newuser">
                                </i> {{__('New User')}}? <a class="btn btn-primary round createaccount" href="{{route('register')}}">{{__('Create Account')}}</a>
                            </div>
                            <!-- sign up form end-->
                        </div>
                        
                        <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active in':''}}">
                            <div class="socialLogin">
                                <h5>{{__('Log in using')}}</h5>
                                <div class="row">
                                    <div class="col-md-4">
                                        <a href="{{ url('login/employer/facebook')}}" class="fb btn-block">
                                            <i class="fa fa-facebook" aria-hidden="true"></i>
                                            <span>Facebook</span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('login/employer/twitter')}}" class="tw btn-block">
                                            <i class="fa fa-twitter" aria-hidden="true"></i>
                                            <span>Twitter</span>
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ url('login/employer/google')}}" class="gp btn-block">
                                            <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            <span>Google</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-divider text-uppercase"><span>{{__('Or')}}</span></h5>
                                    </div>
                                </div>
                            </div>
                            <form class="form-horizontal" method="POST" action="{{ route('company.login') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="employer" />
                                <div class="formpanel">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                                        <label>{{__('Email Address')}}</label>
                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password2" type="password" class="form-control" name="password" value="" required>
                                        <label>{{__('Password')}}</label>
                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                        <span class="show-password toggle-password" toggle="#password2"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <input type="submit" class="signin btn btn-secondary round btn-block" value="{{__('Sign in')}}">
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <div class="forgotpassword">
                                                <a href="{{ route('password.request') }}">{{__('Forgot Password')}}?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- login form  end--> 
                            </form>
                                <!-- sign up form -->
                            <div class="newuser">
                                {{__('New User')}}? <a class="btn btn-primary round createaccount"  href="{{route('register')}}">{{__('Create Account')}}</a>
                            </div>
                                <!-- sign up form end-->
                        </div>
                        <!-- login form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $(".toggle-password").click(function() {
            $(this).toggleClass("active");
            
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
</script>
@endpush


