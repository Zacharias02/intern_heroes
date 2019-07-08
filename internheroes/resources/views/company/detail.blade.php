@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Company Details')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container"> 
        @include('flash::message') 
        <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
                <div class="row">
                    <div class="col-md-6 col-sm-6"> 
                        <!-- Candidate Info -->
                        <div class="candidateinfo">
                            <div class="media">
                                <div class="media-left">
                                    <div class="userPic">
                                        <a href="{{route('company.detail',$company->slug)}}">
                                            <span style="background-image: url({{$company->getCompanyImage()}})"></span>
                                        </a>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="title">{{$company->name}}</div>
                                    <div class="desi">{{$company->getIndustry('industry')}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3"> 
                        <!-- Candidate Contact -->
                        <div class="candidateinfo">
                            <div class="loctext"><i class="fa fa-history" aria-hidden="true"></i> {{__('Member Since')}}, {{$company->created_at->format('M d, Y')}}</div>
                            <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$company->location}}</div>
                            @if(!empty($company->phone))
                            <div class="loctext"><i class="fa fa-phone" aria-hidden="true"></i> <a href="tel:{{$company->phone}}">{{$company->phone}}</a></div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3"> 
                        <!-- Candidate Contact -->
                        <div class="candidateinfo">
                            @if(!empty($company->email))
                            <div class="loctext"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:{{$company->email}}">{{$company->email}}</a></div>
                            @endif
                            @if(!empty($company->website))
                            <div class="loctext"><i class="fa fa-globe" aria-hidden="true"></i> <a href="{{$company->website}}" target="_blank">{{$company->name}}</a></div>
                            @endif  
                            <div class="cadsocial"> {!!$company->getSocialNetworkHtml()!!} </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!Auth::guard('company')->check())
                <!-- Buttons -->
                <div class="jobButtons col-md-8 col-sm-12 col-xs-12"> 
                    <!-- <a href="#contact_company" class="btn btn-large btn-secondary round btn-strong text-uppercase apply">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i> 
                        {{__('Send Message')}}
                    </a>  -->
                    @if(Auth::check() && Auth::user()->isFavouriteCompany($company->slug)) 
                        <a href="{{route('remove.from.favourite.company', $company->slug)}}" class="btn">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                            {{__('Unsave Company')}} 
                        </a> 
                    @else 
                        <a href="{{route('add.to.favourite.company', $company->slug)}}" class="btn">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> 
                            {{__('Save this Company')}}
                        </a> 
                    @endif 
                    @if(!Auth::guard('company')->check())
                        <a href="{{route('report.abuse.company', $company->slug)}}" class="btn report">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
                            {{__('Report Abuse')}}
                        </a> 
                    @endif 
                </div>
                <!-- <div class="jobButtons col-md-4 col-sm-12 col-xs-12" style="display:flex;">
                    <p><h3>Share this at:&nbsp&nbsp </h3></p><span><div class="sharethis-inline-share-buttons"></div></span>
                </div> -->
            @endif
        </div>

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-8"> 
                <!-- About Employee start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('About Company')}}</h3>
                        <p>{!! $company->description !!}</p>
                    </div>
                </div>

                <!-- Opening Jobs start -->
                <div class="relatedJobs">
                    <div class="titleTop">
                        <h3>{{__('Internship Openings')}}</h3>
                    </div>
                    <ul class="searchList">
                        @if(isset($company->jobs) && count($company->jobs))
                        @foreach($company->jobs as $companyJob) 
                        <!--Job start-->
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="jobimg">
                                                <a href="{{route('job.detail', [$companyJob->slug])}}" title="{{$companyJob->title}}"> 
                                                    <span style="background-image: url({{$company->getCompanyImage()}})"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="jobinfo">
                                                <h3><a href="{{route('job.detail', [$companyJob->slug])}}" title="{{$companyJob->title}}">{{$companyJob->title}}</a></h3>
                                                <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                                <div class="location">
                                                    <!-- <label class="partTime" title="{{$companyJob->getJobShift('job_shift')}}">{{$companyJob->getJobShift('job_shift')}}</label> -->
                                                    <span>{{$companyJob->getCity('city')}}</span>
                                                </div>
                                                <div>
                                                    <label class="fulltime" title="{{$companyJob->getJobType('job_type')}}">{{$companyJob->getJobType('job_type')}}</label>
                                                    <!-- <label class="partTime" title="{{$companyJob->getJobShift('job_shift')}}">{{$companyJob->getJobShift('job_shift')}}</label> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn">
                                        <a class="btn btn-primary round text-uppercase" href="{{route('job.detail', [$companyJob->slug])}}">{{__('View Details')}}</a>
                                    </div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($companyJob->description), 150, '...')}}</p>
                        </li>
                        <!--Job end--> 
                        @endforeach
                        @else
                            <div class="empty-state">
                                <span class="empty-state-icon job"></span>
                                <h4 class="empty-state-title">There are no internship opening yet</h4>
                                <p></p>
                            </div>
                        @endif 

                        <!-- Job end -->
                    </ul>
                </div>
            </div>
            <div class="col-md-4"> 
                <!-- Company Detail start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Company Details')}}</h3>
                        <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">{{__('Is Email Verified')}}</div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><span>{{((bool)$company->verified)? 'Yes':'No'}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">{{__('Total Employees')}}</div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><span>{{$company->no_of_employees}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">{{__('Established In')}}</div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><span>{{$company->established_in}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">{{__('Current internships')}}</div>
                                <div class="col-md-6 col-sm-6 col-xs-12"><span>{{$company->countNumJobs('company_id',$company->id)}}</span></div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Google Map start -->
                <!-- @if(NULL != $company->map)
                    <div class="job-header">
                        <div class="jobdetail">
                            <h3>Map</h3>
                            <div class="gmap">
                                {!!$company->map!!}
                            </div>
                        </div>
                    </div>
                @endif -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>Map</h3>
                        <div class="gmap" id="map_canvas">
                            
                        </div>
                    </div>
                </div>

                <!-- Contact Company start -->
                 @if(!Auth::guard('company')->check())
                <div class="job-header">
                    <div class="jobdetail">
                        <h3 id="contact_company">{{__('Contact Company')}}</h3>
                        <div id="alert_messages"></div>
                        <?php
                        $from_name = $from_email = $from_phone = $subject = $message = $from_id = '';
                        if (Auth::check()) {
                            $from_name = Auth::user()->name;
                            $from_email = Auth::user()->email;
                            $from_phone = Auth::user()->phone;
                            $from_id = Auth::user()->id;
                        }
                        $from_name = old('name', $from_name);
                        $from_email = old('email', $from_email);
                        $from_phone = old('phone', $from_phone);
                        $subject = old('subject');
                        $message = old('message');
                        ?>
                        <form method="post" id="send-company-message-form">
                            {{ csrf_field() }}
                            <input type="hidden" name="to_id" value="{{ $company->id }}">
                            <input type="hidden" name="from_id" value="{{ $from_id }}">
                            <input type="hidden" name="company_id" value="{{ $company->id }}">
                            <input type="hidden" name="company_name" value="{{ $company->name }}">
                            <div class="formpanel">
                                <div class="formrow">
                                    <input type="text" name="from_name" value="{{ $from_name }}" class="form-control" required>
                                    <label>Your Name</label>
                                </div>
                                <div class="formrow">
                                    <input type="text" name="from_email" value="{{ $from_email }}" class="form-control" required>
                                    <label>Your Email</label>
                                </div>
                                <div class="formrow">
                                    <input type="text" name="from_phone" value="{{ $from_phone }}" class="form-control" required>
                                    <label>Phone</label>
                                </div>
                                <div class="formrow">
                                    <input type="text" name="subject" value="{{ $subject }}" class="form-control" required>
                                    <label>Subject</label>
                                </div>
                                <div class="formrow">
                                    <textarea name="message" class="form-control" placeholder="Message">{{ $message }}</textarea>
                                </div>
                                <div class="formrow">{!! app('captcha')->display() !!}</div>
                                <div class="formrow">
                                    <input type="button" class="btn btn-secondary round" value="{{__('Submit')}}" id="send_company_message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_company_message', function () {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function (data)
                {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success')
                    {
                        var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else
                    {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function (index, value)
                        {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });
</script>

<script type="text/javascript" async="" defer="">
        var geocoder;
        var map;
        // var overlay;
        // var usgsOverlay;
        var address ="<?php echo $company->location.','.$company->getCity('city').' '.$company->getState('state').','.$company->getCountry('country') ?>";
        
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
@endpush