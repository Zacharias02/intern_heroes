@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Saved Companies')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.user_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Saved Companies')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($companies) && count($companies))
                        @foreach($companies as $company)
                        <li>
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="media">
                                        <div class="media-left">
                                            <div class="jobimg">
                                                <span style="background-image: url({{$company->getCompanyImage()}})"></span>
                                            </div>
                                        </div>
                                        <div class="media-right">
                                            <div class="jobinfo">
                                                <h3><a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a></h3>
                                                <div class="location"> {{$company->getLocation()}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-4">
                                    <div class="listbtn"><a class="btn btn-primary round" href="{{route('company.detail', $company->slug)}}">{{__('View Details')}}</a></div>
                                </div>
                            </div>
                            <p>{{str_limit(strip_tags($company->description), 150, '...')}}</p>
                        </li>
                        <!-- job end --> 
                        @endforeach
                        @endif
                    </ul>
                    @if(count($companies) <= 0)
                        <div class="empty-state">
                            <span class="empty-state-icon job"></span>
                            <h4 class="empty-state-title">You have no likes yet.</h4>
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