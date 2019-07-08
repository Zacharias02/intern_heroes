{!! APFrmErrHelp::showOnlyErrorsNotice($errors) !!}
@include('flash::message')
<div class="form-body">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {!! APFrmErrHelp::hasError($errors, 'logo') !!}">
                <div class="fileinput fileinput-new" data-provides="fileinput" align="center">
                    
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;border:none !important;">
                        @if(isset($company))
                        {{ ImgUploader::print_image("company_logos/$company->logo") }}  
                        @else
                            <img src="{{ asset('/') }}admin_assets/no-image.png" alt="" class="circle-thumbnail"/> 
                        @endif
                    </div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> 
                    </div>
                    <div> 
                        <span class="btn default btn-file"> 
                            <span class="fileinput-new"> Select Company logo </span> 
                            <span class="fileinput-exists"> Change </span> 
                                {!! Form::file('logo', null, array('id'=>'logo', 'class'=>'circle-thumbnail')) !!} 
                        </span> 
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> 
                    </div>

                </div>

                <!--<div class="fileinput fileinput-new" data-provides="fileinput" align="center">
                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;border:none !important;">
                    @if(isset($company))
                    {{ ImgUploader::print_image("company_logos/$company->logo") }}  
                    @else
                        <img src="{{ asset('/') }}admin_assets/no-image.png" alt="" class="circle-thumbnail"/> 
                    @endif-->
                <!--</div>
                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;border:none !important;"> </div>
                    <div> <span class="btn default btn-file"> <span class="fileinput-new"> Select Company Logo </span> <span class="fileinput-exists"> Change </span> {!! Form::file('image', null, 'accept', array('id'=>'image', 'accept')) !!} </span> <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a> </div>-->
                </div>     

                {!! APFrmErrHelp::showErrors($errors, 'logo') !!} </div>
        </div>
        <!--@if(isset($company))
        <div class="col-md-6" id="company-logo">
            {{ ImgUploader::print_image("company_logos/$company->logo") }}   
            <span style="background-image: url({{$company->getCompanyImage()}});background-size: contain;background-repeat: no-repeat;background-position: center;width: 150px;height: 150px;display: block;float: left;border-radius: 50% !important;border: 1px solid #d8e1e9;"></span>   
        </div>    
        @endif--> 
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'name') !!} "> {!! Form::label('name', 'Company Name', ['class' => 'bold']) !!}
        {!! Form::text('name', null, array('class'=>'form-control', 'id'=>'name', 'placeholder'=>'Company Name')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'name') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'email') !!}"> {!! Form::label('email', 'Company E-mail', ['class' => 'bold']) !!}
        {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email', 'placeholder'=>'Company E-mail')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'email') !!} </div>

<!--     <div class="form-group {!! APFrmErrHelp::hasError($errors, 'password') !!}"> {!! Form::label('password', 'Password', ['class' => 'bold']) !!}
        {!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'password') !!} 
        <span><button id="showpass" type="button" onclick="showPassword()">show pass</button></span>
    </div> -->

    <div class="input-group {!! APFrmErrHelp::hasError($errors, 'password') !!} col-md-12" style="position: relative;" > 
        {!! Form::label('password', 'Password', ['class' => 'bold']) !!}
        {!! Form::password('password', array('class'=>'form-control', 'id'=>'password', 'placeholder'=>'Password')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'password') !!}
            <div class="input-group-btn" >
            <button class="btn btn-default" type="button" onclick="showPassword()" id="showpass"style="right:0px; top:25px; position: absolute; z-index: 1000"><i class="glyphicon glyphicon-eye-open" id="picon"></i></button>
            </div>
    </div>
    <br>

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'ceo') !!}"> {!! Form::label('ceo', 'Name of Company\'s CEO', ['class' => 'bold']) !!}
        {!! Form::text('ceo', null, array('class'=>'form-control', 'id'=>'ceo', 'placeholder'=>'Name of Company\'s CEO', 'maxlength'=>'50')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'ceo') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}"> {!! Form::label('industry_id', 'Industry', ['class' => 'bold']) !!}                    
        {!! Form::select('industry_id', ['' => 'Select Industry']+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'ownership_type_id') !!}"> {!! Form::label('ownership_type', 'Ownership Type', ['class' => 'bold']) !!}
        {!! Form::select('ownership_type_id', ['' => 'Select Ownership type']+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id', 'style')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'description') !!}"> {!! Form::label('description', 'Company details', ['class' => 'bold']) !!}
        {!! Form::textarea('description', null, array('class'=>'form-control', 'id'=>'description', 'placeholder'=>'Company details')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'description') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'location') !!}"> {!! Form::label('location', 'Location', ['class' => 'bold']) !!}
        {!! Form::text('location', null, array('class'=>'form-control', 'id'=>'location', 'placeholder'=>'Company Location')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'location') !!} </div>     
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'map') !!}"> {!! Form::label('map', 'Google Map', ['class' => 'bold']) !!}
        {!! Form::textarea('map', null, array('class'=>'form-control textarea-size', 'id'=>'map', 'placeholder'=>'Google Map Link')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'map') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'no_of_offices') !!}"> {!! Form::label('no_of_offices', 'Number of offices', ['class' => 'bold']) !!}
        {!! Form::select('no_of_offices', ['' => 'Select num. of offices']+MiscHelper::getNumOffices(), null, array('class'=>'form-control', 'id'=>'no_of_offices')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'no_of_offices') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'website') !!}"> {!! Form::label('website', 'Website', ['class' => 'bold']) !!}
        {!! Form::text('website', null, array('class'=>'form-control', 'id'=>'website', 'placeholder'=>'Website')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'website') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'no_of_employees') !!}"> {!! Form::label('no_of_employees', 'Number of employees', ['class' => 'bold']) !!}
        {!! Form::select('no_of_employees', ['' => 'Select num. of employees']+MiscHelper::getNumEmployees(), null, array('class'=>'form-control', 'id'=>'no_of_employees')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'no_of_employees') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'established_in') !!}"> {!! Form::label('established_in', 'Established in', ['class' => 'bold']) !!}
        {!! Form::select('established_in', ['' => 'Select Established In']+MiscHelper::getEstablishedIn(), null, array('class'=>'form-control', 'id'=>'established_in')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'established_in') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'fax') !!}"> {!! Form::label('fax', 'Fax Number', ['class' => 'bold']) !!}
        {!! Form::text('fax', null, array('class'=>'form-control', 'id'=>'fax', 'placeholder'=>'Fax Number')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'fax') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'phone') !!}"> {!! Form::label('phone', 'Phone Number', ['class' => 'bold']) !!}
        {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'placeholder'=>'Phone Number')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'phone') !!} </div>




    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'facebook') !!}"> {!! Form::label('facebook', 'Facebook', ['class' => 'bold']) !!}
        {!! Form::text('facebook', null, array('class'=>'form-control', 'id'=>'facebook', 'placeholder'=>'Enter your Facebook Profile URL')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'facebook') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'twitter') !!}"> {!! Form::label('twitter', 'Twitter', ['class' => 'bold']) !!}
        {!! Form::text('twitter', null, array('class'=>'form-control', 'id'=>'twitter', 'placeholder'=>'Enter your Twitter Profile URL')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'twitter') !!} </div>

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'linkedin') !!}"> {!! Form::label('linkedin', 'Linkedin', ['class' => 'bold']) !!}
        {!! Form::text('linkedin', null, array('class'=>'form-control', 'id'=>'linkedin', 'placeholder'=>'Enter your Linkedin Profile URL')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'linkedin') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'google_plus') !!}"> {!! Form::label('google_plus', 'Google+', ['class' => 'bold']) !!}
        {!! Form::text('google_plus', null, array('class'=>'form-control', 'id'=>'google_plus', 'placeholder'=>'Enter your Google+ Profile URL')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'google_plus') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'pinterest') !!}"> {!! Form::label('pinterest', 'Pinterest', ['class' => 'bold']) !!}
        {!! Form::text('pinterest', null, array('class'=>'form-control', 'id'=>'pinterest', 'placeholder'=>'Enter your Pinterest Profile URL')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'pinterest') !!} </div>
    <div class="form-group hidden {!! APFrmErrHelp::hasError($errors, 'country_id') !!}"> {!! Form::label('country_id', 'Country', ['class' => 'bold']) !!}                    
        <?php $country_id = old('country_id', (isset($company) && (int) $company->country_id > 0) ? $company->country_id : $siteSetting->default_country_id); ?>
        {!! Form::select('country_id', ['' => 'Select Country']+$countries, $country_id, array('class'=>'form-control', 'id'=>'country_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
    <div class="form-group hidden {!! APFrmErrHelp::hasError($errors, 'state_id') !!}"> {!! Form::label('state_id', 'State', ['class' => 'bold']) !!}
        <span id="default_state_dd">                    
            {!! Form::select('state_id', ['' => 'Select State'], null, array('class'=>'form-control', 'id'=>'state_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'city_id') !!}"> {!! Form::label('city_id', 'City', ['class' => 'bold']) !!}  
        <span id="default_city_dd">                  
            {!! Form::select('city_id', ['' => 'Select City'], null, array('class'=>'form-control', 'id'=>'city_id')) !!}
        </span>
        {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} </div>


    <!-- <div class="form-group {!! APFrmErrHelp::hasError($errors, 'company_package_id') !!}"> {!! Form::label('company_package_id', 'Package', ['class' => 'bold']) !!}  
        {!! Form::select('company_package_id', ['' => 'Select Package']+$packages, null, array('class'=>'form-control', 'id'=>'company_package_id')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'company_package_id') !!} </div>

    @if(isset($company) && $company->package_id > 0)
    <div class="form-group">
        {!! Form::label('package', 'Package : ', ['class' => 'bold']) !!}         
        <strong>{{$company->getPackage('package_title')}}</strong>
    </div>
    <div class="form-group">
        {!! Form::label('package_Duration', 'Package Duration : ', ['class' => 'bold']) !!}
        <strong>{{$company->package_start_date->format('d M, Y')}}</strong> - <strong>{{$company->package_end_date->format('d M, Y')}}</strong>
    </div>
    <div class="form-group">
        {!! Form::label('package_quota', 'Availed quota : ', ['class' => 'bold']) !!}
        <strong>{{$company->availed_jobs_quota}}</strong> / <strong>{{$company->jobs_quota}}</strong>
    </div>
    <hr/>
    @endif -->

    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_active') !!}">
        {!! Form::label('is_active', 'Is Active?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_active_1 = 'checked="checked"';
            $is_active_2 = '';
            if (old('is_active', ((isset($company)) ? $company->is_active : 1)) == 0) {
                $is_active_1 = '';
                $is_active_2 = 'checked="checked"';
            }
            ?>
            <label class="radio-inline">
                <input id="active" name="is_active" type="radio" value="1" {{$is_active_1}}>
                <span class="v-align-center">Active</span> 
            </label>
            <label class="radio-inline">
                <input id="not_active" name="is_active" type="radio" value="0" {{$is_active_2}}>
                <span class="v-align-center">In-Active</span> 
            </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_active') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'is_featured') !!}">
        {!! Form::label('is_featured', 'Is Featured?', ['class' => 'bold']) !!}
        <div class="radio-list">
            <?php
            $is_featured_1 = '';
            $is_featured_2 = 'checked="checked"';
            if (old('is_featured', ((isset($company)) ? $company->is_featured : 0)) == 1) {
                $is_featured_1 = 'checked="checked"';
                $is_featured_2 = '';
            }
            ?>
            <label class="radio-inline">
                <input id="featured" name="is_featured" type="radio" value="1" {{$is_featured_1}}>
                <span class="v-align-center">Featured</span> 
            </label>
            <label class="radio-inline">
                <input id="not_featured" name="is_featured" type="radio" value="0" {{$is_featured_2}}>
                <span class="v-align-center">Not Featured</span> 
            </label>
        </div>
        {!! APFrmErrHelp::showErrors($errors, 'is_featured') !!} </div>
    <div class="form-actions"> {!! Form::button('Create Company <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>', array('class'=>'btn btn-large btn-primary', 'type'=>'submit')) !!} </div>
</div>
@push('scripts')
@include('admin.shared.tinyMCEFront') 
<script type="text/javascript">
    $(document).ready(function () {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterDefaultStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterDefaultCities(0);
        });
        filterDefaultStates(<?php echo old('state_id', (isset($company)) && (int)$company->state_id > 0 ? $company->state_id : $siteSetting->default_state_id); ?>);
    });
    function filterDefaultStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.default.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterDefaultCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
                    });
        }
    }
    function filterDefaultCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.default.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                    });
        }
    }
</script>
<script type="text/javascript">
    $(".nav").css("display", "none");

    $('#name,#ceo').bind('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9 .,#-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
        event.preventDefault();
        return false;
        }
    });  
 


    function showPassword() {
    var x = document.getElementById("password");
    var y = document.getElementById("picon");
    if (x.type === "password") {
        x.type = "text";
        y.className = "glyphicon glyphicon-eye-close";

    } else {
        x.type = "password";
        y.className = "glyphicon glyphicon-eye-open";
    }
    }
    var t = document.getElementById("description");

    if(t.innerHTML === ""){
        t.innerHTML = "";
    }
    $("div > img:first").addClass("circle-thumbnail");
    $("#company-logo > img").attr("style","width:300px;","accept","image/*");
    $('input[type="file"]:first').attr("accept", "image/*");



    
</script>
<script src="/js/plugins/piexif.js"></script>
<script src="/js/fileinput.js"></script>


@endpush