@if(Auth::guard('company')->check())
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		    <!-- <div class="row srcsubfld additional_fields">
                <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 6:6}}">
                    {!! Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
                </div>

                @if((bool)$siteSetting->country_specific_site)
                {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
                @else
                <div class="col-md-3 hidden">
                    {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
                </div>
                @endif

                <div class="col-md-3">
                    <span id="state_dd">
                        {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
                    </span>
                </div>
                <div class="col-md-3">
                    <span id="city_dd">
                        {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
                    </span>
                </div>
            </div> -->
            <div class="row">
                <!--<div class="col-md-9 col-sm-9">
                    <div class="form-group search-input">
                        <i class="fa fa-search"></i>
                        <input type="text" name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Job Seeker Details...')}}" autocomplete="off" />
                    </div>
                </div>-->   
                <div class="col-md-3 col-sm-3">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-secondary btn-large round" value="{{__('Search Internship Seekers')}}">
                    </span>
                </div>
            </div>
            
           <!--  <div class="input-group">
                <span class="input-group-btn">
                    <input type="submit" class="btn" value="{{__('Search Job Seeker')}}">
                </span>
                <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('')}}" autocomplete="off" />
            </div> -->
		</div>
		
    </div>
</form>
@else
<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
            <!-- <div class="row srcsubfld additional_fields">
                <div class="col-md-{{((bool)$siteSetting->country_specific_site)? 6:6}}">
                    {!! Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
                </div>

                @if((bool)$siteSetting->country_specific_site)
                {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
                @else
                <div class="col-md-3 hidden">
                    {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
                </div>
                @endif
                <div class="col-md-3 hidden">
                    <span id="state_dd">
                        {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', $siteSetting->default_state_id), array('class'=>'form-control', 'id'=>'state_id')) !!}
                    </span>
                </div>
                <div class="col-md-6">
                    <span id="city_dd">
                        {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
                    </span>
                </div>
            </div> -->
            <div class="row">
                <!--<div class="col-md-9 col-sm-9">
                    <div class="form-group search-input">
                        <i class="fa fa-search"></i>
                        <input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Search Jobs by Title or Keywords...')}}" autocomplete="off" />
                    </div>
                </div> -->   
                <div class="col-md-3 col-sm-3">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-secondary btn-large round" value="{{__('Search for Internship')}}">
                    </span>
                </div>
            </div>
		</div>	
    </div>
</form>
@endif