@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Inner Page Title start -->
@include('includes.inner_page_title', ['page_title'=>__('Company Posted Internships')])
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Company Posted Internships')}}</h3>
                    <ul class="row searchList">
                        <!-- job start --> 
                        @if(isset($jobs) && count($jobs))
                        @foreach($jobs as $job)
                        @php $company = $job->getCompany(); @endphp
                        @if(null !== $company)
                        <li class="col-md-12 col-sm-12 two-col" id="job_li_{{$job->id}}">
                            <div class="job-details">
                                <div class="row">
                                    <div class="col-md-12">
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
                                    <!--  <div class="jobimg">{{$company->printCompanyImage()}}</div>
                                        <div class="jobinfo">
                                            <h3><a href="{{route('job.detail', [$job->slug])}}" title="{{$job->title}}">{{$job->title}}</a></h3>
                                            <div class="companyName"><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></div>
                                            <div class="location">
                                                <label class="fulltime" title="{{$job->getJobShift('job_shift')}}">{{$job->getJobShift('job_shift')}}</label>
                                                - <span>{{$job->getCity('city')}}</span>
                                            </div>
                                        </div> -->
                                        <div class="job-action-list">
                                            <i class="fa fa-chevron-circle-down dropdown-toggle"></i>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('list.favourite.applied.users', [$job->id])}}">{{__('View Short Listed Candidates')}}</a></li>
                                                <li><a round" href="{{route('list.applied.users', [$job->id])}}">{{__('View Candidates')}}</a></li>
                                                <li><a href="{{route('edit.front.job', [$job->id])}}">{{__('Edit')}}</a></li>
                                                <li><a href="javascript:;" onclick="deleteJob({{$job->id}});">{{__('Delete')}}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <!--  <div class="col-md-5 col-sm-5">                
                                        <div class="listbtn"><a class="btn btn-primary no-fill round" href="{{route('list.favourite.applied.users', [$job->id])}}">{{__('View Short Listed Candidates')}}</a></div>
                                        <div class="listbtn"><a class="btn btn-primary no-fill round" href="{{route('list.applied.users', [$job->id])}}">{{__('View Candidates')}}</a></div>
                                        <div class="listbtn"><a class="btn btn-primary no-fill round" href="{{route('edit.front.job', [$job->id])}}">{{__('Edit')}}</a></div>
                                        <div class="listbtn"><a class="btn btn-primary no-fill round" href="javascript:;" onclick="deleteJob({{$job->id}});">{{__('Delete')}}</a></div>
                                    </div> -->
                                </div>
                            <p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>
                            </div>
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
<script type="text/javascript">
    $(function() {
        // Dropdown toggle
        $('.dropdown-toggle').click(function(){
            $(this).next('.dropdown-menu').toggle();
        });

        $(document).click(function(e) {
            var target = e.target;
            if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle')) {
                $('.dropdown-menu').hide();
            }
        });

    });


    function deleteJob(id) {
        var msg = 'Are you sure you want permanently remove this Internship Post?';
        if (confirm(msg)) {
        $.post("{{ route('delete.front.job') }}", {id: id, _method: 'DELETE', _token: '{{ csrf_token() }}'})
                .done(function (response) {
                if (response == 'ok')
                {
                $('#job_li_' + id).remove();
                } else
                {
                alert('Request Failed!');
                }
                });
        }
    }
</script>
@endpush