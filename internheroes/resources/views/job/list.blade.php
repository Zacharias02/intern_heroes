@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Internship Listing')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        @include('flash::message')
        <form action="{{route('job.list')}}" method="get">
            <!-- Page Title start -->
            <div class="pageSearch">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        @if(Auth::guard('company')->check())
                        <a href="{{ route('post.job') }}" class="btn btn-secondary round"><i class="fa fa-file-text" aria-hidden="true"></i> {{__('Post Internship')}}</a>
                        @else
                        <a href="{{url('my-profile#cvs')}}" class="btn btn-secondary round"><i class="fa fa-upload" aria-hidden="true"></i> {{__('Upload Your Resume')}}</a>
                        @endif

                    </div>
                    <div class="col-md-9">
                        <div class="searchform">
                            <div class="row">
                                <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 7:7}} col-sm-7">
                                    <input type="text" name="search" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Search Internship Title or Keywords...')}}" />
                                </div>
                                <!-- <div class="col-md-3 col-sm-3"> {!! Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!} </div> -->
                                <!-- @if((bool)$siteSetting->country_specific_site)
                                    {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
                                @else
                                    <div class="col-md-2 hidden">
                                        {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
                                    </div>
                                @endif -->

                               <!--  <div class="col-md-2 hidden">
                                    <span id="state_dd">
                                        {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
                                    </span>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                    <span id="city_dd">
                                        {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
                                    </span>
                                </div>  -->
                                <div class="col-md-1 col-sm-2">
                                    <button type="submit" class="btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Title end -->
        </form>
        <form action="{{route('job.list')}}" method="get">
            <!-- Search Result and sidebar start -->
            <div class="row"> 
                @include('includes.job_list_side_bar')
                <div class="col-md-3 col-sm-6 pull-right hidden-xs hidden-sm">
                    <!-- Sponsord By -->
                    <div class="sidebar">
                        <h4 class="widget-title ads">{{__('Advertisement')}}</h4>
                        <div class="gad">{!! $siteSetting->listing_page_vertical_ad !!}</div>
                        <div class="gad">{!! $siteSetting->listing_page_vertical_ad_2 !!}</div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12"> 
                    <!-- Search List -->
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
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="listbtn">
                                            <a style="width: 100%; padding: 10px 20px !important;" class="btn btn-primary round text-uppercase" href="{{route('job.detail', [$job->slug])}}">{{__('View Details')}}</a>
                                        </div>
                                    </div>
                                </div>
                                <p>{{str_limit(strip_tags($job->description), 150, '...')}}</p>
                            </li>
                        <!-- job end --> 
                        @endif
                        @endforeach
                        @endif
                    </ul>
                    @if($jobs->total() <= 0)
                        <div class="empty-state">
                            <span class="empty-state-icon search"></span>
                            <h4 class="empty-state-title">No results</h4>
                            <p></p>
                        </div>
                    @endif

                    <!-- Pagination Start -->
                    <div class="pagiWrap">
                        <div class="row">
                            <div class="col-md-12 float-none">
                                <div class="showreslt clearfix">
                                    @if($jobs->total() > 0)
                                        <!-- {{__('Showing Pages')}} : <span>{{ $jobs->firstItem() }} - {{ $jobs->lastItem() }} {{__('Total')}} {{ $jobs->total() }}</span> -->
                                        <div class="float-left">
                                            {{__('Showing Internships')}} : <span>{{ $jobs->firstItem() }} - {{ $jobs->lastItem() }}</span>
                                        </div>
                                        <div class="float-right">
                                            {{__('Total Internships')}} : <span>{{ $jobs->total() }}</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                @if(isset($jobs) && count($jobs))
                                {{ $jobs->appends(request()->query())->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Pagination end --> 
                    <div class=""><br />{!! $siteSetting->listing_page_horizontal_ad !!}</div>

                </div>
            </div>
        </form>
    </div>
</div>
@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .searchList li .jobimg {
        min-height: 80px;
    }
/*     .hide_vm_ul{
        height:100px;
        overflow:hidden;
    } */
    .hide_vm{
        display:none !important;
    }
    .view_more{
        cursor:pointer;
    }
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
                $(this).addClass('hide_vm_ul');
                $(this).next().removeClass('hide_vm');
            }
        });
        $('.view_more').on('click', function (e) {
            e.preventDefault();
            $(this).next().removeClass('hide_vm_ul');
            $(this).next().slideDown();
            $(this).addClass('hide_vm-open');
        });

    });
    // Initialize slider:
    $(document).ready(function() {

        var start_price = document.getElementById('salary_from').value;
        var end_price = document.getElementById('salary_to').value;

        $('.noUi-handle').on('click', function() {
            $(this).width(50);
        });
        var rangeSlider = document.getElementById('slider-range');
        var moneyFormat = wNumb({
        decimals: 0,
        thousand: '',
        prefix: ''
        });
        noUiSlider.create(rangeSlider, {
        start: [start_price, end_price],
        step: 1,
        range: {
            'min': [1],
            'max': [300000]
        },
        format: moneyFormat,
        connect: true
        });
        
        // Set visual min and max values and also update value hidden form inputs
        rangeSlider.noUiSlider.on('update', function(values, handle) {
            document.getElementById('salary_from').value = values[0];
            document.getElementById('salary_to').value = values[1];
        });
        // Set readOnly
        $('#salary_from').prop("readOnly",true);
        $("#salary_from").css("border", "2px solid #0062df");
        $('#salary_to').prop("readOnly",true);
        $("#salary_to").css("border", "2px solid #00cbfe");

        $(".noUi-handle-lower").addClass("bg-color-primary");
        $(".noUi-handle-upper").addClass("bg-color-secondary");

           
    });
    
    
</script>
@include('includes.country_state_city_js')
@endpush