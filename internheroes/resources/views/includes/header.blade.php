<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-12 col-xs-12"> <a href="{{url('/')}}" class="logo"><img src="{{ asset('/') }}sitesetting_images/thumb/{{ $siteSetting->site_logo }}" alt="{{ $siteSetting->site_name }}" /></a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12"> 

                <!-- Nav start -->

                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-collapse collapse" id="nav-main">
                        <ul class="nav navbar-nav">
                            <li class="{{ Request::url() == route('index') ? 'active' : '' }}"><a href="{{url('/')}}">{{__('Home')}}</a> </li>
                            <li class="{{ Request::url() == url('/jobs') ? 'active' : ''}}"><a href="{{url('/jobs')}}">{{__('Search for Internship')}}</a> </li>
                            @foreach($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                                    <li class="{{ Request::url() == url('/cms/'.$top_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $top_menu->page_slug) }}">{{ $cmsContent->page_title }}</a> </li>
                            @endforeach
                           
                            <!--<li class="{{ Request::url() == url('/jobs?job_type_id%5B%5D=4') ? 'active' : ''}}"><a href="{{url('/jobs?job_type_id%5B%5D=4')}}">{{__('Interns')}}</a> </li>-->
                            @if(Auth::guard('company')->check())
                                <li id="jobseekers_1" class="{{ Request::url() == url('/job-seekers') ? 'active' : ''}}"><a href="{{url('/job-seekers')}}">{{__('Internship Seekers')}}</a> </li>
                            @endif
                            <li id="companies_1" class="{{ Request::url() == url('/companies') ? 'active' : ''}}" id="companies"><a href="{{url('/companies')}}">{{__('Companies')}}</a> </li>
                            <li class="dropdown">

                                <!--<a href="#">{{__('More')}} <span class="caret"></span></a>-->
                                <!-- dropdown start -->
                                <!--<ul class="dropdown-menu">
                                    @if(Auth::guard('company')->check())
                                    <li id="jobseekers" style="display:none;" class="{{ Request::url() == url('/job-seekers') ? 'active' : ''}}"><a href="{{url('/job-seekers')}}">{{__('Job Seekers')}}</a> </li>
                                    @endif 
                                    <li id="companies" style="display:none;" class="{{ Request::url() == url('/companies') ? 'active' : ''}}" id="companies"><a href="{{url('/companies')}}">{{__('Companies')}}</a> </li>
                                    <li id="contact_us" style="display:none;" class="{{ Request::url() == route('contact.us') ? 'active' : '' }}" id="conctact_Us"><a href="{{ route('contact.us') }}">{{__('Contact us')}}</a> </li>
                                    <li id="contact_us_1" class="{{ Request::url() == route('contact.us') ? 'active' : '' }}" id="conctact_Us"><a href="{{ route('contact.us') }}">{{__('Contact us')}}</a> </li>
                                    @foreach($show_in_top_menu as $top_menu) @php $cmsContent = App\CmsContent::getContentBySlug($top_menu->page_slug); @endphp
                                    <li class="{{ Request::url() == url('/cms/'.$top_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $top_menu->page_slug) }}">{{ $cmsContent->page_title }}</a> </li>
                                    @endforeach
                                </ul>-->
                                <!-- dropdown end --> 
                            </li>
                            @if(Auth::check())
                            <li class="dropdown userbtn">
                                <a class="header-profile-image" href="">
                                    <span style="background-image: url({{Auth::user()->getUserImage()}});"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li><a href="{{ route('my.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('My Profile')}}</a> </li>
                                    <li><a href="{{ route('view.public.profile', Auth::user()->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> {{__('View Public Profile')}}</a> </li>
                                    <li><a href="{{ route('my.job.applications') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Internship Applications')}}</a> </li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif @if(Auth::guard('company')->check())
                            <li class="postjob"><a href="{{route('post.job')}}">{{__('Post Internship')}}</a> </li>
                            <li class="dropdown userbtn">
                                <a class="header-profile-image" href="#">
                                    <span style="background-image: url({{Auth::guard('company')->user()->getCompanyImage()}})"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a> </li>
                                    <li><a href="{{ route('company.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Update Company Profile')}}</a></li>
                                    <li><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post Internship')}}</a></li>
                                    <li><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Company Messages')}}</a></li>
                                    <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-header1').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a> </li>
                                    <form id="logout-form-header1" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                            @endif @if(!Auth::user() && !Auth::guard('company')->user())
                            <li class="postjob dropdown">
                            <a href="#">{{__('Login')}} <span class="caret"></span></a> 

                                <!-- dropdown start -->

                                <ul class="dropdown-menu">
                                    <li><a href="{{route('login')}}">{{__('Login')}}</a> </li>
                                    <li><a href="{{route('register')}}">{{__('Register')}}</a> </li>
                                </ul>

                                <!-- dropdown end --> 

                            </li>
                            @endif
                            <!-- <li class="dropdown userbtn"><a href="{{url('/')}}"><img src="{{asset('/')}}images/lang.png" alt="" class="userimg" /></a>
                                <ul class="dropdown-menu">
                                    @foreach($siteLanguages as $siteLang)
                                    <li><a href="javascript:;" onclick="event.preventDefault(); document.getElementById('locale-form-{{$siteLang->iso_code}}').submit();">{{$siteLang->native}}</a>
                                        <form id="locale-form-{{$siteLang->iso_code}}" action="{{ route('set.locale') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="locale" value="{{$siteLang->iso_code}}"/>
                                            <input type="hidden" name="return_url" value="{{url()->full()}}"/>
                                            <input type="hidden" name="is_rtl" value="{{$siteLang->is_rtl}}"/>
                                        </form>
                                    </li>
                                    @endforeach
                                </ul>
                            </li> -->
                        </ul>

                        <!-- Nav collapes end --> 

                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- Nav end --> 

            </div>
        </div>

        <!-- row end --> 

    </div>

    <!-- Header container end --> 

</div>
