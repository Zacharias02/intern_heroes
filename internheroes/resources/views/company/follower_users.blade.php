@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('Company Followers')]) 
<!-- Inner Page Title end -->
<div class="listpgWraper">
    <div class="container">
        <div class="row">
            @include('includes.company_dashboard_menu')

            <div class="col-md-9 col-sm-8"> 
                <div class="myads">
                    <h3>{{__('Company Followers')}}</h3>
                    <ul class="searchList">
                        <!-- job start --> 
                        @if(isset($users) && count($users))
                            @foreach($users as $user)
                            <li>
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                       <!--  <div class="jobimg">{{$user->printUserImage(100, 100)}}</div>
                                        <div class="jobinfo">
                                            <h3><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h3>
                                            <div class="location"> {{$user->getLocation()}}</div>
                                        </div>
                                        <div class="clearfix"></div> -->
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="jobimg">
                                                    <span style="background-image: url({{$user->getUserImage(100, 100)}})"></span>
                                                </div>
                                            </div>
                                            <div class="media-right">
                                                <div class="jobinfo">
                                                    <h3><a href="{{route('user.profile', $user->id)}}">{{$user->getName()}}</a></h3>
                                                    <div class="location"> {{$user->getLocation()}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3">
                                        <div class="listbtn"><a class="btn btn-primary round" href="{{route('user.profile', $user->id)}}">{{__('View Profile')}}</a></div>
                                    </div>
                                </div>
                                <p>{{str_limit($user->getProfileSummary('summary'),150,'...')}}</p>
                            </li>
                            <!-- job end --> 
                            @endforeach
                        @endif
                    </ul>
                    @if(count($users) <= 0)
                        <div class="empty-state">
                            <span class="empty-state-icon applicant"></span>
                            <h4 class="empty-state-title">No follower yet</h4>
                            <p>Currenly, you don't have followers yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
@endsection