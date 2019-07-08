@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Job Applications')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Job Applications')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($job_applications) && count($job_applications))
                        @foreach($job_applications as $job_application)
                            @php
                                $user = $job_application->getUser();
                                $job = $job_application->getJob();
                                $company = $job->getCompany();             
                                $profileCv = $job_application->getProfileCv();
                            @endphp
                            @if(null !== $job_application && null !== $user && null !== $job && null !== $company && null !== $profileCv)
                                <li>
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5">
                                            <div class="media">
                                                <div class="media-left">
                                                    <div class="jobimg">
                                                        <span style="background-image: url({{$user->getUserImage(100, 100)}})"></span>
                                                    </div>
                                                </div>
                                                <div class="media-right">
                                                    <div class="jobinfo">
                                                        <h3><a href="{{route('applicant.profile', $job_application->id)}}">{{$user->getName()}}</a></h3>
                                                        <div class="location"> {{$user->getLocation()}}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-4">
                                            <div class="minsalary">{{$job_application->salary_currency}} {{$job_application->expected_salary}} <span>/ {{$job->getSalaryPeriod('salary_period')}}</span></div>
                                        </div>
                                        <div class="col-md-3 col-sm-3">
                                            <div class="listbtn"><a class="btn btn-primary round" href="{{route('applicant.profile', $job_application->id)}}">{{__('View Profile')}}</a></div>
                                        </div>
                                    </div>
                                    <p>{{str_limit($user->getProfileSummary('summary'),150,'...')}}</p>
                                </li>
                            <!-- job end --> 
                            @endif
                        @endforeach
                        @endif
                    </ul>
                    @if(count($job_applications) <= 0)
                        <div class="empty-state">
                            <span class="empty-state-icon applicant"></span>
                            <h4 class="empty-state-title">No applicant yet</h4>
                            <p></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection