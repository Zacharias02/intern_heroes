<div class="section featured-jobs">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop align-center">
            <!-- <div class="subtitle">{{__('Here You Can See')}}</div> -->
            <h3><span>{{__('AVAILABLE INTERNSHIPS')}} </span></h3>
            <h3>{{__('Featured Internship')}} </h3>
        </div>
        <!-- title end --> 

        <!--Featured Job start-->
        <ul class="jobslist row">
            @if(isset($featuredJobs) && count($featuredJobs))
            @foreach($featuredJobs as $featuredJob)
            <?php $company = $featuredJob->getCompany(); ?>
            @if(null !== $company)
            <!--Job start-->
            <li class="col-md-6 col-sm-6">
                <div class="jobint">
                    <div class="clearfix">
                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <a class="company-image" href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">
                                <span style="background-image: url({{$company->getCompanyImage()}});"></span>
                            </a>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <h4><a href="{{route('job.detail', [$featuredJob->slug])}}" title="{{$featuredJob->title}}">{{$featuredJob->title}}</a></h4>
                            <div class="company">
                                <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">{{$company->name}}</a>
                            </div>
                            <div class="company-location">
                                <span>{{$featuredJob->getCity('city')}}</span>
                            </div>
                            <div class="jobloc">
                                <label class="fulltime" title="{{$featuredJob->getJobType('job_type')}}">{{$featuredJob->getJobType('job_type')}}</label> 
                            </div>
                        </div>
                        <div class="col-md-4 hidden-sm hidden-xs hidden-md"><a href="{{route('job.detail', [$featuredJob->slug])}}" class="applybtn">{{__('View Details')}}</a></div>
                    </div>
                </div>
            </li>
            <!--Job end--> 
            @endif
            @endforeach
            @endif

        </ul>
        <!--Featured Job end--> 

        <!--button start-->
        <!--<div class="viewallbtn"><a href="{{route('job.list', ['is_featured'=>1])}}">{{__('View All Featured Jobs')}}</a></div>-->
        <!--button end--> 
    </div>
</div>