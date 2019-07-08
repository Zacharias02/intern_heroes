<div class="col-md-3 col-sm-4">
    <ul class="usernavdash">
        <li class="{{ Request::url() == route('company.home') ? 'active' : '' }}"><a href="{{route('company.home')}}"><i class="fa fa-tachometer" aria-hidden="true"></i> {{__('Dashboard')}}</a></li>
        <li class="{{ Request::url() == url('/company-profile') ? 'active' : '' }}"><a href="{{ route('company.profile') }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Update Company Profile')}}</a></li>
        <li><a href="{{ route('company.detail', Auth::guard('company')->user()->slug) }}"><i class="fa fa-user" aria-hidden="true"></i> {{__('View Company Profile')}}</a></li>
        <li class="{{ Request::url() == url('/post-job') ? 'active' : '' }}"><a href="{{ route('post.job') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('Post an Internship')}}</a></li>
        <li class="{{ Request::url() == url('/posted-jobs') ? 'active' : '' }}"><a href="{{ route('posted.jobs') }}"><i class="fa fa-desktop" aria-hidden="true"></i> {{__('My Posted Internships')}}</a></li>

        <!-- <li class="{{ Request::url() == url('/company-messages') ? 'active' : '' }}"><a href="{{route('company.messages')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{__('Company Messages')}}</a></li> -->
        <li class="{{ Request::url() == url('/company-followers') ? 'active' : '' }}"><a href="{{route('company.followers')}}"><i class="fa fa-user-o" aria-hidden="true"></i> {{__('My Followers')}}</a></li>
        <li><a href="{{ route('company.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{__('Logout')}}</a>
            <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
    </ul>
    <div class="row hidden-xs">
        <div class="col-md-12 sidebar-add">
            {!! $siteSetting->dashboard_page_ad !!}</div>
    </div>
</div>