@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Register')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="userccount auth">
                    <div class="userbtns">
                        <ul class="nav nav-tabs">
                            <?php
                            $c_or_e = old('candidate_or_employer', 'candidate');
                            ?>
                            <li class="candidate {{($c_or_e == 'candidate')? 'active':''}}">
                                <a data-toggle="tab" href="#candidate" aria-expanded="true">
                                    <span class="tab-title">{{__('Candidate')}}</span>
                                </a>
                                
                            </li>
                            <li class="employer {{($c_or_e == 'employer')? 'active':''}}">
                                <a data-toggle="tab" href="#employer" aria-expanded="false">
                                    <span class="tab-title">{{__('Employer')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div id="candidate" class="formpanel tab-pane fade {{($c_or_e == 'candidate')? 'active in':''}}">
                            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="candidate" />
                                <div class="formrow{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <input type="text" name="first_name" class="form-control" required="required" value="{{old('first_name')}}">
                                    <label>{{__('First Name')}}</label>
                                    @if ($errors->has('first_name')) <span class="help-block"> <strong>{{ $errors->first('first_name') }}</strong> </span> @endif 
                                </div>

                                <div class="formrow{{ $errors->has('middle_name') ? ' has-error' : '' }}">
                                    <input type="text" name="middle_name" class="form-control" value="{{old('middle_name')}}" required>
                                    <label>{{__('Middle Name')}}</label>
                                    @if ($errors->has('middle_name')) <span class="help-block"> <strong>{{ $errors->first('middle_name') }}</strong> </span> @endif 
                                </div>

                                <div class="formrow{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <input type="text" name="last_name" class="form-control" required="required" value="{{old('last_name')}}">
                                    <label>{{__('Last Name')}}</label>
                                    @if ($errors->has('last_name')) <span class="help-block"> <strong>{{ $errors->first('last_name') }}</strong> </span> @endif 
                                </div>

                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" class="form-control" required="required" value="{{old('email')}}">
                                    <label>{{__('Email')}}</label>
                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 
                                </div>

                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" id="password" name="password" class="form-control" required="required" value="">
                                    <label>{{__('Password')}}</label>
                                    <span class="show-password toggle-password" toggle="#password"></span>
                                </div>

                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" id="confirm-password" name="password_confirmation" class="form-control" required="required" value="">
                                    <label>{{__('Password Confirmation')}}</label>
                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif
                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif 
                                    <span class="show-password toggle-password" toggle="#confirm-password"></span>
                                </div>

                                <!--<div class="row hidden">
                                    
                                    <div class="col-md-6">
                                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'phone') !!}"> 
                                            {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'minlength'=>'7', 'maxlength'=>'14')) !!}
                                            <label>{{__('Phone Number')}}</label>
                                            {!! APFrmErrHelp::showErrors($errors, 'phone') !!} </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'mobile_num') !!}"> 
                                            {!! Form::text('mobile_num', null, array('maxlength'=>'11','class'=>'form-control', 'id'=>'mobile_num', 'required')) !!}
                                            <label>{{__('Mobile Number')}}</label>
                                            {!! APFrmErrHelp::showErrors($errors, 'mobile_num') !!} </div>
                                    </div>
                                </div>
                                <div class="row hidden">
                                    <div class="col-md-6 hidden">
                                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
                                            <?php $country_id = old('country_id', (isset($user) && (int) $user->country_id > 0) ? $user->country_id : $siteSetting->default_country_id); ?>            
                                            {!! Form::select('country_id', [''=>__('Select Country')] + $countries, $country_id, array('class'=>'form-control', 'id'=>'country_id', 'required')) !!}
                                            <label>{{__('Select Country')}}</label>
                                            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}"> 
                                            <span id="state_dd">
                                                {!! Form::select('state_id', [''=>__('Select State')], null, array('class'=>'form-control', 'id'=>'state_id', 'required')) !!} 
                                                <label>{{__('Select State')}}</label>
                                            </span>
                                            {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}"> 
                                            <span id="city_dd">
                                                {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-control', 'id'=>'city_id', 'required')) !!} 
                                                <label>{{__('City')}}</label>
                                            </span>
                                            {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} 
                                        </div>
                                    </div>

                                </div>-->

                                <div class="subscribe-check {{ $errors->has('is_subscribed') ? ' has-error' : '' }}">
                                    <?php
                                    $is_checked = '';
                                    if (old('is_subscribed', 1)) {
                                        $is_checked = 'checked="checked"';
                                    }
                                    ?>
                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />{{__('Subscribe to news letter')}}
                                    @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif 
                                </div>  
                                @foreach($show_in_footer_menu as $footer_menu)
                                @php
                                    $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                                @endphp

                                    @if($cmsContent->page_id == '4')
                                    <div class="formrow terms-check {{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                                    <input type="checkbox" value="1" name="terms_of_use" />
                                    <a class="color-content" href="{{ route('cms', $footer_menu->page_slug) }}">{{__('I accept the Terms and Conditions')}}</a>
                                    @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif 
                                </div>
                                    @else
                                    
                                    @endif
                                    
                                @endforeach
                            
                                <div class="formrow{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}"> {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif </div>
                                <div class="row" align="center">
                                    <div class="col-md-6" style="float:none !important;">
                                        <input type="submit" class="btn btn-secondary round btn-block" value="{{__('Create Account')}}">
                                    </div>
                                </div>
                            </form>

                            
                            <!-- sign up form -->
                            <div class="newuser">{{__('Have an Account')}}? <a class="btn btn-primary round" href="{{route('login')}}">{{__('Log in')}}</a></div>
                            <!-- sign up form end--> 
                        </div>
                        <div id="employer" class="formpanel tab-pane fade {{($c_or_e == 'employer')? 'active in':''}}">
                            <form class="form-horizontal" method="POST" action="{{ route('company.register') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="candidate_or_employer" value="employer" />
                                <div class="formrow{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" required="required" value="{{old('name')}}">
                                    <label>{{__('Name')}}</label>
                                    @if ($errors->has('name')) <span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span> @endif 
                                </div>
                                <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" class="form-control" required="required" value="{{old('email')}}">
                                    <label>{{__('Email')}}</label>
                                    @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif 
                                </div>
                                <div class="formrow{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password"  id="pass" name="password" class="form-control" required="required" value="">
                                    <label>{{__('Password')}}</label>
                                    
                                    <span class="show-password toggle-password" toggle="#pass"></span>
                                </div>
                                <div class="formrow{{ $errors->has('password_confirmation') ? ' has-error' : '' }}{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input type="password" id="confirm-pass" name="password_confirmation" class="form-control" required="required" value="">
                                    <label>{{__('Password Confirmation')}}</label>
                                    @if ($errors->has('password_confirmation')) <span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span> @endif 
                                    @if ($errors->has('password')) <span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span> @endif 
                                    <span class="show-password toggle-password" toggle="#confirm-pass"></span>
                                </div>
                                <div class="subscribe-check {{ $errors->has('is_subscribed') ? ' has-error' : '' }}">
                                    <?php
                                    $is_checked = '';
                                    if (old('is_subscribed', 1)) {
                                        $is_checked = 'checked="checked"';
                                    }
                                    ?>
                                    <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />{{__('Subscribe to news letter')}}
                                    @if ($errors->has('is_subscribed')) <span class="help-block"> <strong>{{ $errors->first('is_subscribed') }}</strong> </span> @endif
                                </div>
                                <div class="formrow terms-check {{ $errors->has('terms_of_use') ? ' has-error' : '' }}">
                                    <input type="checkbox" value="1" name="terms_of_use" />
                                    <a href="{{url('cms/terms-of-use')}}">{{__('I accept the Terms and Conditions')}}</a>

                                    @if ($errors->has('terms_of_use')) <span class="help-block"> <strong>{{ $errors->first('terms_of_use') }}</strong> </span> @endif </div>
                                <!--<div class="formrow{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}"> {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif </div>-->
                                <div class="row" align="center">
                                    <div class="col-md-6" style="float:none !important;">
                                        <input type="submit" class="btn btn-secondary round btn-block" value="{{__('Create Account')}}">
                                    </div>
                                </div>
                            </form>
                            <!-- sign up form -->
                            <div class="newuser">{{__('Have an Account')}}? <a class="btn btn-primary round" href="{{route('login')}}">{{__('Log in')}}</a></div>
                            <!-- sign up form end--> 
                        </div>
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
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {

        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterCities(0);
        });
        filterStates(<?php echo $siteSetting->default_country_id ; ?>);
        /*******************************/

    });

    function filterStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#state_dd').html(response);
                        $('#state_dd').append('<label>{{__('Province')}}</label>');
                    });
        }
    }
    function filterCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#city_dd').html(response);
                        $('#city_dd').append('<label>{{__('City')}}</label>');
                    });
        }
    }
    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,    
            format: 'yyyy-m-d',
            max: 0
        });
    } 
</script> 
@endpush   
