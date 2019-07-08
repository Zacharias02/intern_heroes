@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Internship Details')]) 
<!-- Inner Page Title end -->
@php
$company = $job->getCompany();
@endphp
<div class="listpgWraper">
    <div class="container"> 
        @include('flash::message')
        <!-- Job Header start -->
        <div class="job-header">
            <div class="jobinfo">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <h2>{{$job->title}} - {{$company->name}}</h2>
                        <div class="ptext">{{__('Date Posted')}}: {{$job->created_at->format('M d, Y')}}</div>
                        <!-- @if(!(bool)$job->hide_salary)
                        <div class="salary">{{__('Monthly Salary')}}: <strong>{{number_format($job->salary_from).' '.$job->salary_currency}} - {{number_format($job->salary_to).' '.$job->salary_currency}}</strong></div>
                        @endif -->
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="companyinfo">
                            <div class="media">
                                <div class="media-left">
                                    <div class="companylogo"><a href="{{route('company.detail',$company->slug)}}"><span style="background-image: url({{$company->getCompanyImage()}});"></span></a></div>
                                </div>
                                <div class="media-body">
                                    <div class="title"><a href="{{route('company.detail',$company->slug)}}">{{$company->name}}</a></div>
                                    <div class="ptext">{{$company->getLocation()}}</div>
                                    <div class="opening">
                                        <a href="{{route('company.detail',$company->slug)}}">
                                            {{App\Company::countNumJobs('company_id', $company->id)}} {{__('Current Internship Openings')}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if(!Auth::guard('company')->check())
                <div class="jobButtons jbWidth col-md-8 col-sm-12 col-xs-12">

                    @if(Auth::check() && Auth::user()->isAppliedOnJob($job->id))
                    <a href="{{route('remove.from.applied', $job->id)}}" class="btn btn-large btn-secondary round btn-strong text-uppercase apply"><i class="fa fa-ban" aria-hidden="true"></i> {{__('Cancel Application')}}</a>
                    @else
                    <a href="{{route('apply.job', $job->slug)}}" class="btn btn-large btn-secondary round btn-strong text-uppercase apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> {{__('Apply Now')}}</a>
                    @endif


                    <a href="{{route('email.to.friend', $job->slug)}}" class="btn"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Email to Friend')}}</a>
                    @if(Auth::check() && Auth::user()->isFavouriteJob($job->slug)) 
                    <a href="{{route('remove.from.favourite', $job->slug)}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Unsave this Internship')}} </a> 
                    @else <a href="{{route('add.to.favourite', $job->slug)}}" class="btn"><i class="fa fa-floppy-o" aria-hidden="true"></i> {{__('Save this Internship')}}</a> @endif
                    <a href="{{route('report.abuse', $job->slug)}}" class="btn report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> {{__('Report Abuse')}}</a>

                </div>
                <!-- <div class="jobButtons col-md-4 col-sm-12 col-xs-12" style="display:flex;">
                    <p><h3>Share this at:&nbsp&nbsp </h3></p><span><div class="sharethis-inline-share-buttons"></div></span>
                </div> -->

            @endif
        </div>

        <!-- Job Detail start -->
        <div class="row">
            <div class="col-md-8"> 
                <!-- Job Description start -->
                <div class="job-header">
                    <div class="contentbox">
                        <h3>{{__('Internship Description')}}</h3>
                        <p>{!! $job->description !!}</p>

                        @if($job->getJobSkillsList())
                        <!-- <h3>{{__('Skills Required')}}</h3>
                        <ul class="skillslist">
                            {!!$job->getJobSkillsList()!!}
                        </ul> -->
                        @endif
                    </div>
                </div>
                <!-- Job Description end --> 

                <!-- related jobs start -->
                <div class="relatedJobs hidden-xs hidden-sm">
                    <div class="titleTop">
                        <!-- <div class="subtitle">Here You Can See</div> -->
                        <h3>{{__('Related Internships')}}</h3>
                    </div>
                    <ul class="searchList">
                        @if(isset($relatedJobs) && count($relatedJobs))
                            @foreach($relatedJobs as $relatedJob)

                                <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                                @if(null !== $relatedJobCompany)
                                <!--Job start-->
                                 @if(count($relatedJobs) == '1')
                                    <div class="empty-state">
                                        <span class="empty-state-icon job"></span>
                                        <h4 class="empty-state-title">There are no related internships</h4>
                                        <p></p>
                                    </div>
                                @endif
                                @if($relatedJob->slug != $job->slug)


                                <li>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="jobimg">
                                                        <a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">
                                                            {{$relatedJobCompany->printCompanyImage()}}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="jobinfo">
                                                        <h3><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h3>
                                                        <div class="companyName"><a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a></div>
                                                        <div class="location">
                                                            <span>{{$relatedJob->getCity('city')}}</span>
                                                        </div>
                                                        <div>
                                                            <label class="fulltime">{{$relatedJob->getJobType('job_type')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="listbtn"><a class="btn btn-primary round text-uppercase"  href="{{route('job.detail', [$relatedJob->slug])}}">{{__('View Detail')}}</a></div>
                                        </div>
                                    </div>
                                    <p>{{str_limit(strip_tags($relatedJob->description), 150, '...')}}</p>
                                </li>
                                @endif
                                <!--Job end--> 
                                @endif
                            @endforeach
                        @else
                            <div class="empty-state">
                                <span class="empty-state-icon job"></span>
                                <h4 class="empty-state-title">There are no related internships</h4>
                                <p></p>
                            </div>
                        @endif
                        <!-- Job end -->
                    </ul>
                </div>
            </div>
            <!-- related jobs end -->

            <div class="col-md-4"> 
                <!-- Job Detail start -->
                <div class="job-header">
                    <div class="jobdetail">
                        <h3>{{__('Intership Details')}}</h3>
                        <ul class="jbdetail">
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Location')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12">
                                    @if((bool)$job->is_freelance)
                                    <span>Freelance</span>
                                    @else
                                    <span>{{$job->getLocation()}}</span>
                                    @endif
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Company')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><a href="{{route('company.detail', $company->id)}}">{{$company->name}}</a></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Type')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span class="permanent">{{$job->getJobType('job_type')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Shift')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span class="freelance">{{$job->getJobShift('job_shift')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Career Level')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->getCareerLevel('career_level')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Positions')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->num_of_positions}}</span></div>
                            </li>
                            <!-- <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Experience')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->getJobExperience('job_experience')}}</span></div>
                            </li> -->
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Gender')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->getGender('gender')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Degree')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->getDegreeLevel('degree_level')}}</span></div>
                            </li>
                            <li class="row">
                                <div class="col-md-4 col-sm-6 col-xs-12">{{__('Apply Before')}}</div>
                                <div class="col-md-8 col-sm-6 col-xs-12"><span>{{$job->expiry_date->format('M d, Y')}}</span></div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Google Map start -->
                <!-- @if(NULL != $company->map)
                    <div class="job-header">
                        <div class="jobdetail">
                            <h3>{{__('Google Map')}}</h3>
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

                <div class="relatedJobs hidden-md hidden-lg">
                    <div class="titleTop">
                        <!-- <div class="subtitle">Here You Can See</div> -->
                        <h3>{{__('Related')}} <span>{{__('Jobs')}}</span></h3>
                    </div>
                    <ul class="searchList">
                        @if(isset($relatedJobs) && count($relatedJobs))
                            @foreach($relatedJobs as $relatedJob)
                                <?php $relatedJobCompany = $relatedJob->getCompany(); ?>
                                @if(null !== $relatedJobCompany)
                                <!--Job start-->
                                <li>
                                    <div class="row">
                                        <div class="col-md-8 col-sm-8">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="jobimg">
                                                        <a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">
                                                            {{$relatedJobCompany->printCompanyImage()}}
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="jobinfo">
                                                        <h3><a href="{{route('job.detail', [$relatedJob->slug])}}" title="{{$relatedJob->title}}">{{$relatedJob->title}}</a></h3>
                                                        <div class="companyName"><a href="{{route('company.detail', $relatedJobCompany->slug)}}" title="{{$relatedJobCompany->name}}">{{$relatedJobCompany->name}}</a></div>
                                                        <div class="location">
                                                            <span>{{$relatedJob->getCity('city')}}</span>
                                                        </div>
                                                        <div>
                                                            <label class="fulltime">{{$relatedJob->getJobType('job_type')}}</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="listbtn"><a class="btn btn-primary no-fill round text-uppercase"  href="{{route('job.detail', [$relatedJob->slug])}}">{{__('View Detail')}}</a></div>
                                        </div>
                                    </div>
                                    <p>{{str_limit(strip_tags($relatedJob->description), 150, '...')}}</p>
                                </li>
                                <!--Job end--> 

                                @endif
                            @endforeach
                        @else
                            <div class="empty-state">
                                <span class="empty-state-icon job"></span>
                                <h4 class="empty-state-title">There are no related jobs</h4>
                                <p></p>
                            </div>
                        @endif
                        <!-- Job end -->

                    </ul>
                </div>
            </div>
        </div>
    </div>  
                                <div align="center">
                                    {!! $siteSetting->cms_page_ad !!}
                                </div>  
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .view_more{display:none !important;}
</style>
@endpush
@push('scripts') 
<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);

        $(".view_more_ul").each(function () {
            if ($(this).height() > 100)
            {
                $(this).css('height', 100);
                $(this).css('overflow', 'hidden');
                //alert($( this ).next());
                $(this).next().removeClass('view_more');
            }
        });

    });
</script> 
<script type="text/javascript" async="" defer="">
        var geocoder;
        var map;
        // var overlay;
        // var usgsOverlay;
        var address ="<?php echo $job->getLocation(); ?>";
        
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