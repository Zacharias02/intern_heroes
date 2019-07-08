<div class="section greybg">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop align-center">
            <!-- <div class="subtitle">{{__('Here You Can See')}}</div> -->
            <h3><span>{{__('COMPANIES HIRING')}} </span></h3>
            <h3>{{__('Available Slots')}} </h3>
        </div>
        <!-- title end -->

        <ul class="jobslist row">
            @if(isset($latestJobs) && count($latestJobs))
            @foreach($latestJobs as $latestJob)
            <?php $company = $latestJob->getCompany(); ?>
            @if(null !== $company)
            <!--Job start-->
            <li class="col-md-4 col-sm-6">
                <div class="jobint">
                    <div class="clearfix">
                        <div class="col-md-4 col-sm-4">
                            <a class="company-image" href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}">
                                <span style="background-image: url({{$company->getCompanyImage()}});"></span>
                            </a>
                        </div>
                        <div class="col-md-8 col-sm-8">
                            <h4><a href="{{route('job.detail', [$latestJob->slug])}}" title="{{$latestJob->title}}">{{$latestJob->title}}</a></h4>
                            <div class="company">
                                <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a>
                            </div>
                            <div class="company-location">
                                <span>{{$latestJob->getCity('city')}}</span>
                            </div>
                            <div class="jobloc">
                                <label class="fulltime" title="{{$latestJob->getJobType('job_type')}}">{{$latestJob->getJobType('job_type')}}</label> 
                            </div>
                        </div>                       
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
            @endif
        </ul>
        <!--view button-->
        <div class="viewallbtn"><a href="{{route('job.list')}}">{{__('View More Slots')}}</a></div>
        <!--view button end--> 
        <div class="section p-0">
            <div class="largebanner">
                <div class="adin">
                    {!! $siteSetting->index_page_below_top_employes_ad !!}
                </div>
            <div class="clearfix"></div>
        </div>
</div>
    </div>
</div>