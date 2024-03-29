<div class="popular_searches">
<div class="section">
    <div class="container">
        <div class="topsearchwrap">
			<div class="tabswrap">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12 titleTop align-left mb-0">
                        <h3><span>{{__('OPEN POSITIONS')}} </span></h3>
                        <h3>{{__('Internship Opportunities')}} </h3>
                    </div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<ul class="nav nav-tabs">
						  <!-- <li ><a data-toggle="tab" href="#byfunctional" aria-expanded="true">{{__('Functional Area')}}</a></li> -->
						  <li class="active"><a data-toggle="tab" href="#bycities" aria-expanded="false">{{__('Municipalities')}}</a></li>
						  <li class=""><a data-toggle="tab" href="#byindustries" aria-expanded="false">{{__('Industries')}}</a></li>
						</ul>
					</div>
				</div>
			</div>
				
			<div class="tab-content">

				<!-- <div id="byfunctional" class="tab-pane fade active in">
					<div class="srchbx">				
            
                <div class="srchint">
                    <ul class="row catelist">
                        @if(isset($topFunctionalAreaIds) && count($topFunctionalAreaIds)) @foreach($topFunctionalAreaIds as $functional_area_id_num_jobs)
                        <?php
                        $functionalArea = App\ FunctionalArea::where('functional_area_id', '=', $functional_area_id_num_jobs->functional_area_id)->lang()->active()->first();
                        ?> @if(null !== $functionalArea)

                        <li class="col-md-4 col-sm-6"><a href="{{route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id])}}" title="{{$functionalArea->functional_area}}">{{$functionalArea->functional_area}} <span>({{$functional_area_id_num_jobs->num_jobs}})</span></a>
                        </li>

                        @endif @endforeach @endif
                    </ul>
                    
                </div>
            </div>
				</div> -->


				<div id="bycities" class="tab-pane fade active in">
					<div class="srchbx">
                <!--Cities start-->
                
                <div class="srchint">
                    <ul class="row catelist">
                        @if(isset($topCityIds) && count($topCityIds)) @foreach($topCityIds as $city_id_num_jobs)
                        <?php
                        $city = App\ City::getCityById($city_id_num_jobs->city_id);
                        ?> @if(null !== $city)

                        <li class="col-md-3 col-sm-4 col-xs-6"><a href="{{route('job.list', ['city_id[]'=>$city->city_id])}}" title="{{$city->city}}">{{$city->city}} <span>({{$city_id_num_jobs->num_jobs}})</span></a>
                        </li>

                        @endif @endforeach @endif
                    </ul>
                    <!--Cities end-->
                </div>
            </div>
				</div>
				<div id="byindustries" class="tab-pane fade">
					<div class="srchbx">
                <!--Categories start-->
               
                <div class="srchint">
                    <ul class="row catelist">					
                        @if(isset($topIndustryIds) && count($topIndustryIds)) @foreach($topIndustryIds as $industry_id => $num_jobs)
                        <?php
                        $industry = App\ Industry::where('industry_id', '=', $industry_id)->lang()->active()->first();
                        ?> @if(null !== $industry)
                        <li class="col-md-4 col-sm-6"><a href="{{route('job.list', ['industry_id[]'=>$industry->industry_id])}}" title="{{$industry->industry}}">{{$industry->industry}} <span>({{$num_jobs}})</span></a>
                        </li>
                        @endif @endforeach @endif
                    </ul>
                    <!--Categories end-->
                </div>
            </div>				
				</div>
			</div>
			

            

            

            
        </div>
    </div>
</div>
</div>  