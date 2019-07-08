<h5>{{__('Company Information')}}</h5>
{!! Form::model($company, array('method' => 'put', 'route' => array('update.company.profile'), 'class' => 'form', 'files'=>true)) !!}
<!-- <h6>{{__('Company Logo')}}</h6> -->
<div class="row">
    <div class="col-md-5 mb-4 text-center">
        <div class="formrow">
            <div class="profile-image" id="profile-image">  
                <span style='background-image: url({{ ImgUploader::print_image_src("/company_logos/$company->logo") }});'></span>  
            </div>
        </div>
        <div class="formrow">
            <!-- <div id="thumbnail" class="mb-2"></div> -->
            <label class="btn btn-secondary round"> {{__('Upload Company Logo')}}
                <i class="ml-1 fa fa-upload"></i>
                <input type="file" name="logo" id="logo" style="display: none;">
            </label>
            {!! APFrmErrHelp::showErrors($errors, 'logo') !!} 
        </div>
        <!-- <div class="formrow"> {{ ImgUploader::print_image("company_logos/$company->logo", 100, 100) }} </div> -->
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'name') !!}"> 
            {!! Form::text('name', null, array('class'=>'form-control', 'id'=>'name')) !!}
            <label>{{__('Company Name')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'name') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}"> 
            {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email')) !!}
            <label>{{__('Company Email')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'email') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}"> 
            {!! Form::password('password', array('class'=>'form-control', 'id'=>'password')) !!}
            <label>{{__('Password')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'password') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'ceo') !!}"> 
            {!! Form::text('ceo', null, array('class'=>'form-control', 'id'=>'ceo')) !!}
            <label>{{__('Company CEO')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'ceo') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}"> 
            {!! Form::select('industry_id', ['' => __('Select Industry')]+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')) !!}
            <label>{{__('Industry')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'ownership_type') !!}"> 
            {!! Form::select('ownership_type_id', ['' => __('Select Ownership type')]+$ownershipTypes, null, array('class'=>'form-control', 'id'=>'ownership_type_id')) !!}
            <label>{{__('Ownership type')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'ownership_type_id') !!} </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'description') !!}"> 
            {!! Form::textarea('description', null, array('class'=>'form-control', 'placeholder' => 'Short description about your company.')) !!}
            <label>{{__('Company details')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'description') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 hidden">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}"> 
            <?php $country_id = old('country_id', (isset($company) && (int) $company->country_id > 0) ? $company->country_id : $siteSetting->default_country_id); ?>
            {!! Form::select('country_id', ['' => __('Select Country')]+$countries, $country_id, array('class'=>'form-control', 'id'=>'country_id')) !!}
            <label>{{__('Select Country')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}">
            <span id="default_state_dd"> 
                {!! Form::select('state_id', ['' => __('Select State')], null, array('class'=>'form-control', 'id'=>'state_id')) !!} 
                <label>{{__('Select State')}}</label>
            </span>
            {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} 
        </div>
    </div>
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'location') !!}"> 
            {!! Form::text('location', null, array('class'=>'form-control', 'id'=>'location')) !!}
            <label>{{__('Address / Building / Floor No / Street')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'location') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}"> 
            <span id="default_city_dd">
                {!! Form::select('city_id', ['' => __('Select City')], null, array('class'=>'form-control', 'id'=>'city_id')) !!} 
                <label>{{__('Select City')}}</label>
            </span>
            {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'no_of_offices') !!}"> 
            {!! Form::select('no_of_offices', ['' => __('Select num. of offices')]+MiscHelper::getNumOffices(), null, array('class'=>'form-control', 'id'=>'no_of_offices')) !!}
            <label>{{__('Number of offices')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'no_of_offices') !!} </div>
    </div>
</div>
<div class="row">
    
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'website') !!}"> 
            {!! Form::text('website', null, array('class'=>'form-control', 'id'=>'website')) !!}
            <label>{{__('Company Website Url')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'website') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'no_of_employees') !!}"> 
            {!! Form::select('no_of_employees', ['' => __('Select num. of employees')]+MiscHelper::getNumEmployees(), null, array('class'=>'form-control', 'id'=>'no_of_employees')) !!}
            <label>{{__('Number of employees')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'no_of_employees') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'established_in') !!}"> 
            {!! Form::select('established_in', ['' => __('Select Established In')]+MiscHelper::getEstablishedIn(), null, array('class'=>'form-control', 'id'=>'established_in')) !!}
            <label>{{__('Select Established In')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'established_in') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'fax') !!}"> 
            {!! Form::text('fax', null, array('class'=>'form-control', 'id'=>'fax')) !!}
            <label>{{__('Fax Number')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'fax') !!} 
        </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'phone') !!}"> 
            {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone')) !!}
            <label>{{__('Phone Number')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'phone') !!} </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'facebook') !!}">
            {!! Form::text('facebook', null, array('class'=>'form-control', 'id'=>'facebook')) !!}
            <label>{{__('Facebook')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'facebook') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'twitter') !!}"> 
            {!! Form::text('twitter', null, array('class'=>'form-control', 'id'=>'twitter')) !!}
            <label>{{__('Twitter')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'twitter') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'linkedin') !!}"> 
            {!! Form::text('linkedin', null, array('class'=>'form-control', 'id'=>'linkedin')) !!}
            <label>{{__('Linkedin')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'linkedin') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'google_plus') !!}"> 
            {!! Form::text('google_plus', null, array('class'=>'form-control', 'id'=>'google_plus')) !!}
            <label>{{__('Google+')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'google_plus') !!} </div>
    </div>
    <div class="col-md-4">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'pinterest') !!}"> 
            {!! Form::text('pinterest', null, array('class'=>'form-control', 'id'=>'pinterest')) !!}
            <label>{{__('Pinterest')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'pinterest') !!} </div>
    </div>
</div>
<!-- <div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'map') !!}"> 
            {!! Form::textarea('map', null, array('class'=>'form-control', 'id'=>'map')) !!}
            <label>{{__('Embeded Google Map')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'map') !!} 
        </div>
    </div>
</div> -->
<div class="row">
    <div class="col-md-12">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'is_subscribed') !!}">
        <?php
        $is_checked = 'checked="checked"';	
        if (old('is_subscribed', ((isset($company)) ? $company->is_subscribed : 1)) == 0) {
            $is_checked = '';
        }
        ?>
        <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
        {{__('Subscribe to news letter')}}
      {!! APFrmErrHelp::showErrors($errors, 'is_subscribed') !!}
      </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="">
            <button type="submit" class="btn btn-secondary round">{{__('Update Profile')}} <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        </div>
    </div>
</div>
<input type="file" name="image" id="image" style="display:none;" accept="image/*"/>
{!! Form::close() !!}
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts')
@include('includes.tinyMCEFront') 
<script type="text/javascript">
    $('#name,#ceo').bind('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9 .,#-]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
        event.preventDefault();
        return false;
        }
    });  

    $(document).ready(function () {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterLangStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterLangCities(0);
        });
        filterLangStates(<?php echo old('state_id', (isset($company)) && (int)$company->state_id > 0 ? $company->state_id : $siteSetting->default_state_id); ?>);

        /*******************************/
        var fileInput = document.getElementById("logo");
        fileInput.addEventListener("change", function (e) {
            var files = this.files
            showThumbnail(files)
        }, false)
    });

    function showThumbnail(files) {
        $('#thumbnail').html('');
        for (var i = 0; i < files.length; i++) {
            var file = files[i]
            var imageType = /image.*/
            if (!file.type.match(imageType)) {
                console.log("Not an Image");
                continue;
            }
            var reader = new FileReader()
            reader.onload = (function (theFile) {
                return function (e) {
                    $('#profile-image span').css('background-image','url(' + e.target.result + ')');
                };
            }(file))
            var ret = reader.readAsDataURL(file);
        }
    }


    function filterLangStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_state_dd').html(response);
                        filterLangCities(<?php echo old('city_id', (isset($company)) ? $company->city_id : 0); ?>);
                    });
        }
    }
    function filterLangCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#default_city_dd').html(response);
                        $('#default_city_dd').append('<label>{{__('Select City')}}</label>');
                    });
        }
    }
</script> 
@endpush