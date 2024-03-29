@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Report Abuse')])
<!-- Inner Page Title end -->
<!-- Page Title End -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="userccount"> {!! Form::open(array('method' => 'post', 'route' => ['report.abuse.company', $slug])) !!}
                    <div class="formpanel"> 
                        <!-- Ad Information -->
                        <h5>{{__('Report Abuse')}}</h5>            
                        <div class="row">
                            <div class="col-md-12 hidden">
                                <div class="formrow{{ $errors->has('listing_url') ? ' has-error' : '' }}">
                                    {!! Form::text('company_url', route('company.detail', $slug), array('class'=>'form-control', 'id'=>'company_url', 'placeholder'=>__('URL'), 'required'=>'required', 'readonly'=>'readonly')) !!}                
                                    @if ($errors->has('company_url')) <span class="help-block"> <strong>{{ $errors->first('company_url') }}</strong> </span> @endif </div>
                            </div>                            
                            <div class="col-md-12">
                                <div class="formrow{{ $errors->has('your_name') ? ' has-error' : '' }}">
                                    <?php
                                    $your_name = (Auth::check()) ? Auth::user()->name : '';
                                    ?>
                                    {!! Form::text('your_name', $your_name, array('class'=>'form-control', 'id'=>'your_name', 'placeholder'=>__('Your Name'), 'required'=>'required')) !!}                
                                    @if ($errors->has('your_name')) <span class="help-block"> <strong>{{ $errors->first('your_name') }}</strong> </span> @endif </div>
                            </div>
                            <div class="col-md-12">
                                <div class="formrow{{ $errors->has('your_email') ? ' has-error' : '' }}">
                                    <?php
                                    $your_email = (Auth::check()) ? Auth::user()->email : '';
                                    ?>
                                    {!! Form::text('your_email', $your_email, array('class'=>'form-control', 'id'=>'your_email', 'placeholder'=>__('Your Email'), 'required'=>'required')) !!}                
                                    @if ($errors->has('your_email')) <span class="help-block"> <strong>{{ $errors->first('your_email') }}</strong> </span> @endif </div>
                            </div>
                            <div class="col-md-12">
                                <div class="formrow{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="submit" id="post_ad_btn" class="pull-right btn btn-secondary round btn-large" value="{{__('Report')}}">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection