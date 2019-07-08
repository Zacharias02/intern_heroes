<div class="col-md-3 col-sm-12"> 
    <!-- Side Bar start -->
    <div class="sidebar">
        <input type="hidden" name="search" value="{{Request::get('search', '')}}"/>
        <!-- Jobs By Title -->
        <!-- <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Title')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobTitlesArray) && count($jobTitlesArray))
                @foreach($jobTitlesArray as $key=>$jobTitle)
                <li>
                    @php
                    $checked = (in_array($jobTitle, Request::get('job_title', array())))? 'checked="checked"':'';
                    @endphp
                    <input type="checkbox" name="job_title[]" id="job_title_{{$key}}" value="{{$jobTitle}}" {{$checked}} >
                    <label for="job_title_{{$key}}"></label>
                    {{$jobTitle}} <span>{{App\Job::countNumJobs('title', $jobTitle)}}</span> </li>

                @endforeach
                @endif
            </ul>
            
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
        </div> -->

        <!-- Jobs By Country -->
        <!-- <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Country')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($countryIdsArray) && count($countryIdsArray))
                @foreach($countryIdsArray as $key=>$country_id)
                @php
                $country = App\Country::where('country_id','=',$country_id)->lang()->active()->first();			  
                @endphp
                @if(null !== $country)
                @php
                $checked = (in_array($country->country_id, Request::get('country_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="country_id[]" id="country_{{$country->country_id}}" value="{{$country->country_id}}" {{$checked}}>
                    <label for="country_{{$country->country_id}}"></label>
                    {{$country->country}} <span>{{App\Job::countNumJobs('country_id', $country->country_id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
        </div> -->
        <!-- Jobs By Country end--> 


        <!-- Jobs By State -->
        <!-- <div class="widget">
            <h4 class="widget-title">{{__('Jobs By State')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($stateIdsArray) && count($stateIdsArray))
                @foreach($stateIdsArray as $key=>$state_id)
                @php
                $state = App\State::where('state_id','=',$state_id)->lang()->active()->first();			  
                @endphp
                @if(null !== $state)
                @php
                $checked = (in_array($state->state_id, Request::get('state_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="state_id[]" id="state_{{$state->state_id}}" value="{{$state->state_id}}" {{$checked}}>
                    <label for="state_{{$state->state_id}}"></label>
                    {{$state->state}} <span>{{App\Job::countNumJobs('state_id', $state->state_id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
        </div> -->
        <!-- Jobs By State end--> 


        <!-- Jobs By City -->
        <div class="widget">
            <h4 class="widget-title">{{__('Municipality')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($cityIdsArray) && count($cityIdsArray))
                    @foreach($cityIdsArray as $key => $city_id)
                        @php
                        $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();			  
                        @endphp
                        @if(null !== $city)
                            @php
                            $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}}>
                                    <label for="city_{{$city->city_id}}"></label>
                                    {{$city->city}} <span>{{App\Job::countNumJobs('city_id', $city->city_id)}}</span> 
                                </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more1">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                        @foreach($cityIdsArray as $key => $city_id)
                            @php
                            $city = App\City::where('city_id','=',$city_id)->lang()->active()->first();			  
                            @endphp
                            @if(null !== $city)
                                @php
                                $checked = (in_array($city->city_id, Request::get('city_id', array())))? 'checked="checked"':'';
                                @endphp
                                @if($key > 3)
                                    
                                        <li>
                                            <input type="checkbox" name="city_id[]" id="city_{{$city->city_id}}" value="{{$city->city_id}}" {{$checked}}>
                                            <label for="city_{{$city->city_id}}"></label>
                                            {{$city->city}} <span>{{App\Job::countNumJobs('city_id', $city->city_id)}}</span> 
                                        </li>
                                @endif
                            @endif
                        @endforeach
                        <span class="text text-primary view_more hide_vm" id="view_less1">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
           
        </div>
        <!-- Jobs By City end--> 
        
        <!-- Jobs By Industry -->
        <div class="widget">
            <h4 class="widget-title">{{__('Industry')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($industryIdsArray) && count($industryIdsArray))
                    @foreach($industryIdsArray as $key=>$industry_id)
                        @php
                        $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $industry)
                            @php
                            $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                                    <label for="industry_{{$industry->id}}"></label>
                                    {{$industry->industry}} <span>{{App\Job::countNumJobs('industry_id', $industry->id)}}</span> 
                                </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more2">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                            @foreach($industryIdsArray as $key=>$industry_id)
                                @php
                                $industry = App\Industry::where('id','=',$industry_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $industry)
                                    @php
                                    $checked = (in_array($industry->id, Request::get('industry_id', array())))? 'checked="checked"':'';
                                    @endphp
                                    @if($key > 3)
                                        <li>
                                            <input type="checkbox" name="industry_id[]" id="industry_{{$industry->id}}" value="{{$industry->id}}" {{$checked}}>
                                            <label for="industry_{{$industry->id}}"></label>
                                            {{$industry->industry}} <span>{{App\Job::countNumJobs('industry_id', $industry->id)}}</span> 
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                            <span class="text text-primary view_more hide_vm" id="view_less2">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Jobs By Industry end --> 
        <div class="widget">
            <h4 class="widget-title">{{__('Functional Areas')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($functionalAreaIdsArray) && count($functionalAreaIdsArray))
                    @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                        @php
                        $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $functionalArea)
                            @php
                            $checked = (in_array($functionalArea->functional_area_id, Request::get('functional_area_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                                    <label for="functional_area_id_{{$functionalArea->functional_area_id}}"></label>
                                    {{$functionalArea->functional_area}} <span>{{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}}</span>
                                </li>
                            @else
                                @break
                            @endif            
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                            @foreach($functionalAreaIdsArray as $key=>$functional_area_id)
                                @php
                                $functionalArea = App\FunctionalArea::where('functional_area_id','=',$functional_area_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $functionalArea)
                                    @php
                                    $checked = (in_array($functionalArea->functional_area_id, Request::get('functional_area_id', array())))? 'checked="checked"':'';
                                    @endphp
                                    @if($key > 3)
                                        <li>
                                            <input type="checkbox" name="functional_area_id[]" id="functional_area_id_{{$functionalArea->functional_area_id}}" value="{{$functionalArea->functional_area_id}}" {{$checked}}>
                                            <label for="functional_area_id_{{$functionalArea->functional_area_id}}"></label>
                                            {{$functionalArea->functional_area}} <span>{{App\Job::countNumJobs('functional_area_id', $functionalArea->functional_area_id)}}</span>
                                        </li>      
                                    @endif          
                                @endif
                            @endforeach
                        </ul>
                    </li>
                @endif
            </ul>
        </div> 

        <!-- Jobs By Experience -->
        <!--<div class="widget">
            <h4 class="widget-title">{{__('Experience')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobExperienceIdsArray) && count($jobExperienceIdsArray))
                    @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                        @php
                        $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();			  
                        @endphp
                        @if(null !== $jobExperience)
                            @php
                                $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                                    <label for="job_experience_{{$jobExperience->job_experience_id}}"></label>
                                    {{$jobExperience->job_experience}}s <span>{{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}}</span> 
                                </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more3">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                            @foreach($jobExperienceIdsArray as $key=>$job_experience_id)
                                @php
                                $jobExperience = App\JobExperience::where('job_experience_id','=',$job_experience_id)->lang()->active()->first();			  
                                @endphp
                                @if(null !== $jobExperience)
                                    @php
                                        $checked = (in_array($jobExperience->job_experience_id, Request::get('job_experience_id', array())))? 'checked="checked"':'';
                                    @endphp
                                    @if($key > 3)
                                        <li>
                                            <input type="checkbox" name="job_experience_id[]" id="job_experience_{{$jobExperience->job_experience_id}}" value="{{$jobExperience->job_experience_id}}" {{$checked}}>
                                            <label for="job_experience_{{$jobExperience->job_experience_id}}"></label>
                                            {{$jobExperience->job_experience}}s <span>{{App\Job::countNumJobs('job_experience_id', $jobExperience->job_experience_id)}}</span> 
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                            <span class="text text-primary view_more hide_vm" id="view_less3">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>-->
        <!-- Jobs By Experience end --> 

        <!-- Jobs By Job Type -->
        <!--<div class="widget">
            <h4 class="widget-title">{{__('Job Type')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobTypeIdsArray) && count($jobTypeIdsArray))
                    @foreach($jobTypeIdsArray as $key=>$job_type_id)
                        @php
                        $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $jobType)
                            @php
                            $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                                    <label for="job_type_{{$jobType->job_type_id}}"></label>
                                    {{$jobType->job_type}} <span>{{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}}</span> 
                                </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more4">{{__('View More')}} <i class="fa fa-chevron-down"></i></span> 
                        <ul class="hide_vm_ul">
                            @foreach($jobTypeIdsArray as $key=>$job_type_id)
                                @php
                                $jobType = App\JobType::where('job_type_id','=',$job_type_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $jobType)
                                    @php
                                    $checked = (in_array($jobType->job_type_id, Request::get('job_type_id', array())))? 'checked="checked"':'';
                                    @endphp
                                    @if($key > 3)
                                        <li>
                                            <input type="checkbox" name="job_type_id[]" id="job_type_{{$jobType->job_type_id}}" value="{{$jobType->job_type_id}}" {{$checked}}>
                                            <label for="job_type_{{$jobType->job_type_id}}"></label>
                                            {{$jobType->job_type}} <span>{{App\Job::countNumJobs('job_type_id', $jobType->job_type_id)}}</span> 
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                            <span class="text text-primary view_more hide_vm" id="view_less4">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>-->
        <!-- Jobs By Job Type end --> 

        <!-- Jobs By Job Shift -->
        <!-- <div class="widget">
            <h4 class="widget-title">{{__('Job Shift')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($jobShiftIdsArray) && count($jobShiftIdsArray))
                @foreach($jobShiftIdsArray as $key=>$job_shift_id)
                @php
                $jobShift = App\JobShift::where('job_shift_id','=',$job_shift_id)->lang()->active()->first();
                @endphp
                @if(null !== $jobShift)
                @php
                $checked = (in_array($jobShift->job_shift_id, Request::get('job_shift_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_shift_id[]" id="job_shift_{{$jobShift->job_shift_id}}" value="{{$jobShift->job_shift_id}}" {{$checked}}>
                    <label for="job_shift_{{$jobShift->job_shift_id}}"></label>
                    {{$jobShift->job_shift}} <span>{{App\Job::countNumJobs('job_shift_id', $jobShift->job_shift_id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> </div> -->
        <!-- Jobs By Job Shift end --> 

        <!-- Jobs By Career Level -->
        <!--<div class="widget">
            <h4 class="widget-title">{{__('Career Level')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($careerLevelIdsArray) && count($careerLevelIdsArray))
                    @foreach($careerLevelIdsArray as $key=>$career_level_id)
                        @php
                        $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                        @endphp
                        @if(null !== $careerLevel)
                            @php
                                $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                            <li>
                                <input type="checkbox" name="career_level_id[]" id="career_level_{{$careerLevel->career_level_id}}" value="{{$careerLevel->career_level_id}}" {{$checked}}>
                                <label for="career_level_{{$careerLevel->career_level_id}}"></label>
                                {{$careerLevel->career_level}} <span>{{App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)}}</span> </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more5">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                            @foreach($careerLevelIdsArray as $key=>$career_level_id)
                                @php
                                    $careerLevel = App\CareerLevel::where('career_level_id','=',$career_level_id)->lang()->active()->first();
                                @endphp
                                @if(null !== $careerLevel)
                                    @php
                                        $checked = (in_array($careerLevel->career_level_id, Request::get('career_level_id', array())))? 'checked="checked"':'';
                                    @endphp
                                    @if($key > 3)
                                        <li>
                                            <input type="checkbox" name="career_level_id[]" id="career_level_{{$careerLevel->career_level_id}}" value="{{$careerLevel->career_level_id}}" {{$checked}}>
                                            <label for="career_level_{{$careerLevel->career_level_id}}"></label>
                                            {{$careerLevel->career_level}} <span>{{App\Job::countNumJobs('career_level_id', $careerLevel->career_level_id)}}</span> </li>
                                    @endif
                                @endif
                            @endforeach
                            <span class="text text-primary view_more hide_vm" id="view_less5">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>-->
        <!-- Jobs By Career Level end --> 


        <!-- Jobs By Degree Level -->
        <div class="widget">
            <h4 class="widget-title">{{__('Degree Level')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($degreeLevelIdsArray) && count($degreeLevelIdsArray))
                    @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                        @php
                            $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                        @endphp

                        @if(null !== $degreeLevel)
                            @php
                                $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                            @endphp
                            @if($key <= 3)
                                <li>
                                    <input type="checkbox" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                                    <label for="degree_level_{{$degreeLevel->degree_level_id}}"></label>
                                    {{$degreeLevel->degree_level}} <span>{{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}}</span> 
                                </li>
                            @else
                                @break
                            @endif
                        @endif
                    @endforeach
                    <li class="folding_filter">
                        <span class="text text-primary view_more hide_vm" id="view_more6">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
                        <ul class="hide_vm_ul">
                            @foreach($degreeLevelIdsArray as $key=>$degree_level_id)
                                @php
                                    $degreeLevel = App\DegreeLevel::where('degree_level_id','=',$degree_level_id)->lang()->active()->first();
                                @endphp
                                
                                @if(null !== $degreeLevel)
                                    @php
                                        $checked = (in_array($degreeLevel->degree_level_id, Request::get('degree_level_id', array())))? 'checked="checked"':'';
                                    @endphp 
                                    @if($key > 3)
                                        <li>
                                            
                                            <input type="checkbox" name="degree_level_id[]" id="degree_level_{{$degreeLevel->degree_level_id}}" value="{{$degreeLevel->degree_level_id}}" {{$checked}}>
                                            <label for="degree_level_{{$degreeLevel->degree_level_id}}"></label>
                                            {{$degreeLevel->degree_level}} <span>{{App\Job::countNumJobs('degree_level_id', $degreeLevel->degree_level_id)}}</span> </li>
                                    @endif  
                                @endif
                            @endforeach
                            <span class="text text-primary view_more hide_vm" id="view_less6">{{__('View Less')}} <i class="fa fa-chevron-up"></i> </span>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!-- Jobs By Degree Level end --> 


        <!-- Jobs By Gender -->
       <!--  <div class="widget">
            <h4 class="widget-title">{{__('Gender')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($genderIdsArray) && count($genderIdsArray))
                @foreach($genderIdsArray as $key=>$gender_id)
                @php
                $gender = App\Gender::where('gender_id','=',$gender_id)->lang()->active()->first();
                @endphp
                @if(null !== $gender)
                @php
                $checked = (in_array($gender->gender_id, Request::get('gender_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="gender_id[]" id="gender_{{$gender->gender_id}}" value="{{$gender->gender_id}}" {{$checked}}>
                    <label for="gender_{{$gender->gender_id}}"></label>
                    {{$gender->gender}} <span>{{App\Job::countNumJobs('gender_id', $gender->gender_id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> </div> -->
        <!-- Jobs By Gender end --> 



        
        <!-- Jobs By Industry end --> 

        <!-- Jobs By Skill -->
       <!--  <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Skill')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($skillIdsArray) && count($skillIdsArray))
                @foreach($skillIdsArray as $key=>$job_skill_id)
                @php
                $jobSkill = App\JobSkill::where('job_skill_id','=',$job_skill_id)->lang()->active()->first();
                @endphp
                @if(null !== $jobSkill)

                @php
                $checked = (in_array($jobSkill->job_skill_id, Request::get('job_skill_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="job_skill_id[]" id="job_skill_{{$jobSkill->job_skill_id}}" value="{{$jobSkill->job_skill_id}}" {{$checked}}>
                    <label for="job_skill_{{$jobSkill->job_skill_id}}"></label>
                    {{$jobSkill->job_skill}} <span>{{App\Job::countNumJobs('job_skill_id', $jobSkill->job_skill_id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
        </div> -->
       


        <!-- Top Companies -->
        <!-- <div class="widget">
            <h4 class="widget-title">{{__('Jobs By Company')}}</h4>
            <ul class="optionlist view_more_ul">
                @if(isset($companyIdsArray) && count($companyIdsArray))
                @foreach($companyIdsArray as $key=>$company_id)
                @php
                $company = App\Company::where('id','=',$company_id)->active()->first();
                @endphp
                @if(null !== $company)
                @php
                $checked = (in_array($company->id, Request::get('company_id', array())))? 'checked="checked"':'';
                @endphp
                <li>
                    <input type="checkbox" name="company_id[]" id="company_{{$company->id}}" value="{{$company->id}}" {{$checked}}>
                    <label for="company_{{$company->id}}"></label>
                    {{$company->name}} <span>{{App\Job::countNumJobs('company_id', $company->id)}}</span> </li>
                @endif
                @endforeach
                @endif
            </ul>
            <span class="text text-primary view_more hide_vm">{{__('View More')}} <i class="fa fa-chevron-down"></i> </span> 
        </div> -->
        <!-- Top Companies end --> 

        <!-- Salary -->
        <div class="widget">
            <!--<h4 class="widget-title">{{__('Salary Range')}}</h4>
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-range"></div>
                    <div class="slider-ranger-input">
                        <span class="currency">&#x20b1;</span>
                        {!! Form::number('salary_from', Request::get('salary_from', 1), array('min'=>'0','class'=>'form-control', 'id'=>'salary_from', 'placeholder'=>__('Salary From'))) !!}
                        <span class="seperator"> - </span>
                        <span class="currency">&#x20b1;</span>
                        {!! Form::number('salary_to', Request::get('salary_to', 300000), array('min'=>'0','class'=>'form-control', 'id'=>'salary_to', 'placeholder'=>__('Salary To'))) !!}
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                
            </div>
            <!-- <div class="form-group">
                {!! Form::select('salary_currency', ['' =>__('Select Salary Currency')]+$currencies, Request::get('salary_currency', $siteSetting->default_currency_code), array('class'=>'form-control', 'id'=>'salary_currency')) !!}
            </div> -->
            <!-- Salary end --> 

            <!-- button -->
            <div class="searchnt">
                <button type="submit" class="btn btn-secondary round"><i class="fa fa-filter" aria-hidden="true"></i> {{__('Filter Internship')}}</button>
            </div>
            <!-- button end--> 
        </div>
        <!-- Side Bar end --> 
    </div>
    <!-- Advertisement -->
    <div class="sidebar">
        <h4 class="widget-title ads">{{__('Advertisement')}}</h4>
        <div class="gad">{!! $siteSetting->listing_page_vertical_ad_3 !!}</div>
    </div>
</div>
@push('scripts')
<script>
$(document).ready(function(){

/* City = View less */
  $("#view_less1").click(function(){
    $("#view_more1").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* City = View more */
  $("#view_more1").click(function(){
    $("#view_less1").removeClass("hide_vm-open");
  });
/* industry = View less */
  $("#view_less2").click(function(){
    $("#view_more2").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* industry = View more */
  $("#view_more2").click(function(){
    $("#view_less2").removeClass("hide_vm-open");
  });
/* Experience = View less */
  $("#view_less3").click(function(){
    $("#view_more3").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* Experience = View more */
  $("#view_more3").click(function(){
    $("#view_less3").removeClass("hide_vm-open");
  });
/* Job Type = View less */
  $("#view_less4").click(function(){
    $("#view_more4").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* Job Type = View more */
  $("#view_more4").click(function(){
    $("#view_less4").removeClass("hide_vm-open");
  });
/* Career Level = View less */
  $("#view_less5").click(function(){
    $("#view_more5").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* Career Level = View more */
  $("#view_more5").click(function(){
    $("#view_less5").removeClass("hide_vm-open");
  });
/* Degree Level = View less */
  $("#view_less6").click(function(){
    $("#view_more6").removeClass("hide_vm-open");
    $(".optionlist > li.folding_filter > ul").addClass("hide_vm_ul");
  });
/* Degree Level = View more */
  $("#view_more6").click(function(){
    $("#view_less6").removeClass("hide_vm-open");
  });



});
</script>
@endpush