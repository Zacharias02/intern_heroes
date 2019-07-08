@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Applied Internships')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.user_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Applied Internships')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="jobimg">
                                                <a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}"> 
                                                    <span style="background-image: url({{$company->getCompanyImage()}})"></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="jobinfo">
                                                <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                                <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                                <div class="location">
                                                    <span>{{$job->getCity('city')}}</span>
                                                </div>
                                                <div>
                                                    <label class="fulltime" title="{{$job->getJobType('job_type')}}">{{$job->getJobType('job_type')}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="jobinfo">
                                        <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                        <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                        <div class="location">
                                            <label class="fulltime" title="{{$job->getJobShift('job_shift')}}">{{$job->getJobShift('job_shift')}}</label>
                                            - <span>{{$job->getCity('city')}}</span></div>
                                    </div> -->
                                    <div class="clearfix"></div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a class="btn btn-primary round" href="{{route('job.detail', [$job->slug])}}">{{__('View Details')}}</a></div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>
                        </li>
                        <!-- job end --> 
                        @endif
                        @endforeach
                        @endif
                    </ul>
                    @if(count($jobs) <= 0)
                        <div class="empty-state">
                            <span class="empty-state-icon job"></span>
                            <h4 class="empty-state-title">There are no internships available</h4>
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
@push('scripts')
@include('includes.immediate_available_btn')
@endpush