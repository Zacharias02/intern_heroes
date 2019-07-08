@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Contact Us')])
<!-- Inner Page Title end -->
<div class="listpgWraper"> 
    <!-- About -->
    <div class="container">
        <div class="contact-wrap">
            <div class="titleTop align-center"> 
                <!-- <span>{{__('We Are Here For Your Help')}}</span> -->
                <h3>{{__('Get in touch')}}</h3>
               <!--  <p>
                    {{__('Vestibulum at magna tellus. Vivamus sagittis nunc aliquet. Vivamin orci aliquam')}}
                    <br>
                    {{__('eros vel saphicula. Donec eget ultricies ipsmconsequat')}}
                </p> -->
            </div>
           
            <!-- Contact info -->
            <div class="row"> 
                <!-- Contact form -->
                <div class="col-md-8 column mb-3">
                    <div class="contact-form">
                        <div id="message"></div>
                        <form method="post" action="{{ route('contact.us')}}" name="contactform" id="contactform">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6"> 
                                    <div class="formrow{{ $errors->has('full_name') ? ' has-error' : '' }}">                  
                                        {!! Form::text('full_name', null, array('id'=>'full_name', 'required'=>'required', 'autofocus'=>'autofocus')) !!}                
                                        <label>{{__('Full Name')}}</label>
                                        @if ($errors->has('full_name')) <span class="help-block"> <strong>{{ $errors->first('full_name') }}</strong> </span> @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="formrow{{ $errors->has('email') ? ' has-error' : '' }}">                  
                                        {!! Form::text('email', null, array('id'=>'email', 'required'=>'required')) !!}                
                                        <label>{{__('Email (E.g. juan@email.com)')}}</label>
                                        @if ($errors->has('email')) <span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span> @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="formrow{{ $errors->has('phone') ? ' has-error' : '' }}">                  
                                        {!! Form::text('phone', null, array('id'=>'phone', 'required'=>'required')) !!}                
                                        <label>{{__('Phone Number')}}</label>
                                        @if ($errors->has('phone')) <span class="help-block"> <strong>{{ $errors->first('phone') }}</strong> </span> @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="formrow{{ $errors->has('subject') ? ' has-error' : '' }}">                  
                                        {!! Form::text('subject', null, array('id'=>'subject', 'required'=>'required')) !!}                
                                        <label>{{__('Subject')}}</label>
                                        @if ($errors->has('subject')) <span class="help-block"> <strong>{{ $errors->first('subject') }}</strong> </span> @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="formrow{{ $errors->has('message_txt') ? ' has-error' : '' }}">                  
                                        {!! Form::textarea('message_txt', null, array('id'=>'message_txt', 'required'=>'required')) !!}                
                                        <label>{{__('Message')}}</label>
                                        @if ($errors->has('message_txt')) <span class="help-block"> <strong>{{ $errors->first('message_txt') }}</strong> </span> @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="formrow{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}" align="left">
                                        {!! app('captcha')->display() !!}
                                        @if ($errors->has('g-recaptcha-response')) <span class="help-block"> <strong>{{ $errors->first('g-recaptcha-response') }}</strong> </span> @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="formrow" align="left">
                                        <button title="" class="button" type="submit" id="submit">{{__('Submit Now')}}</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 column"> 
                     <!-- Contact info -->
                    <div class="row contact-header">
                        <div class="col-md-12 column">
                            <div class="contact"> <span style="font-size: 36px;"><i class="fa fa-envelope"></i></span>
                                <div class="information"> <strong>{{__('Email Address')}}:</strong>
                                    <p><a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 column">
                            <div class="contact"> <span><i class="fa fa-phone"></i></span>
                                <div class="information"> <strong>{{__('Contact Number')}}:</strong>
                                    <p><a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></p>
                                    <p><a href="tel:{{ $siteSetting->site_phone_secondary }}">{{ $siteSetting->site_phone_secondary }}</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection

<!-- @push('scripts') 
<script type="text/javascript" async="" defer="">
        var geocoder;
        var map;
        // var overlay;
        // var usgsOverlay;
        var address = "<?php echo $siteSetting->site_street_address; ?>";
        
        function initMap() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            
            // USGSOverlay.prototype = new google.maps.OverlayView();

            var myOptions = {
                zoom: 16,
                center: latlng,
                disableDefaultUI: true,
                mapTypeControl: false,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            
            if (geocoder) {
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            map.setCenter(results[0].geometry.location);

                            var infowindow = new google.maps.InfoWindow({ 
                                content: '<b>'+address+'</b>',
                                size: new google.maps.Size(150,50)
                            });

                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map, 
                                title:address
                                // icon: '6096188ce806c80cf30dca727fe7c237.png'
                            }); 
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map,marker);
                            });

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }

        var textarea = document.querySelector('textarea');

        textarea.addEventListener('keydown', autosize);
                    
        function autosize(){
            var el = this;
            setTimeout(function(){
                el.style.cssText = 'height:auto; padding:0';
                // for box-sizing other than "content-box" use:
                // el.style.cssText = '-moz-box-sizing:content-box';
                el.style.cssText = 'height:' + el.scrollHeight + 'px';
            },0);
        }
</script>
<script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmiJ65xZEpp2SVHj56w-ih7qrSXUi4e3U&amp;callback=initMap">
        </script> 
@endpush -->