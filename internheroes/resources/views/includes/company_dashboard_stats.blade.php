<ul class="row profilestat">
    <li class="col-md-4 col-sm-12 col-xs-12">
        <div class="inbox"> 
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                </div>
                <div class="media-body">
                    <h6><a href="{{route('posted.jobs')}}">{{Auth::guard('company')->user()->countOpenJobs()}} {{__('Open Internships')}}</a></h6>
                </div>
            </div>
        </div>
    </li>
    <li class="col-md-4 col-sm-12 col-xs-12">
        <div class="inbox"> 
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </div>
                <div class="media-body">
                    <h6>
                        <a href="{{route('company.followers')}}">
                            {{Auth::guard('company')->user()->countFollowers()}} 
                            @if(Auth::guard('company')->user()->countFollowers() > 1)
                            {{__('Followers')}}
                            @else
                            {{__('Follower')}}
                            @endif
                        </a>
                    </h6>
                </div>
            </div>
        </div>
    </li>
    <!-- <li class="col-md-4 col-sm-4 col-xs-6">
        <div class="inbox"> 
            <div class="media">
                <div class="media-left">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                </div>
                <div class="media-body">
                    <h6><a href="{{route('company.messages')}}">{{Auth::guard('company')->user()->countCompanyMessages()}} {{__('Messages')}}</a></h6>
                </div>
            </div>
        </div>
    </li> -->
</ul>