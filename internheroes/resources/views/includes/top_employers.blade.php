<div class="top_employers">
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop align-center">            
            <h3>{{__('COMPANIES THAT TRUST US')}}</h3>
        </div>
        <!-- title end -->

        <ul class="employerList">
            <!--employer-->
            @if(isset($topCompanyIds) && count($topCompanyIds))
            @foreach($topCompanyIds as $company_id_num_jobs)
            <?php
            $company = App\Company::where('id', '=', $company_id_num_jobs->company_id)->active()->first();
            if (null !== $company) {
                ?>
                <!-- data-toggle="tooltip" data-placement="bottom"  -->
                <li class="item" tdata-original-title="{{$company->name}}">
                    <a href="{{route('company.detail', $company->slug)}}" title="{{$company->name}}">
                    <!--<img src="{{$company->getCompanyImage()}}" alt="" title="{{$company->name}}">-->
                    <span style="background-image: url({{$company->getCompanyImage()}})"></span>
                    <!--<span style="background-image: url(company_logos/{{$company->logo}})"></span>-->
                    </a>
                </li>
                <?php
            }
            ?>
            @endforeach
            @endif
        </ul>

    </div>    
</div>
</div>