<h5>{{__('Personal Information')}}</h5>
{!! Form::model($user, array('method' => 'put', 'route' => array('my.profile'), 'class' => 'form', 'files'=>true)) !!}
<!-- <h6>{{__('Profile Image')}}</h6> -->
<div class="row">
    <div class="col-md-5 mb-4 text-center">
        <div class="formrow"> 
            <div class="profile-image" id="profile-image">  
                <span style='background-image: url({{ ImgUploader::print_image_src("/user_images/$user->image",200,200) }});'></span>  
            </div>
        </div>
        <div class="formrow">
            <!-- <div id="thumbnail" class="mb-2"></div> -->
            <label class="btn btn-secondary round"> {{__('Upload Profile Image')}}
                <i class="ml-1 fa fa-upload"></i>
                <input type="file" name="image" id="image" style="display: none;">
            </label>
            {!! APFrmErrHelp::showErrors($errors, 'image') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'first_name') !!}"> 
            {!! Form::text('first_name', null, array('class'=>'form-control', 'id'=>'first_name')) !!}
            <label>{{__('First Name')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'first_name') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'middle_name') !!}"> 
            {!! Form::text('middle_name', null, array('class'=>'form-control', 'id'=>'middle_name')) !!}
            <label>{{__('Middle Name')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'middle_name') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'last_name') !!}"> 
            {!! Form::text('last_name', null, array('class'=>'form-control', 'id'=>'last_name')) !!}
            <label>{{__('Last Name')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'last_name') !!}
        </div>
    </div>
    <div class="col-md-6 hidden">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'father_name') !!}"> 
            {!! Form::text('father_name', null, array('class'=>'form-control', 'id'=>'father_name')) !!}
            <label>{{__("Father's Name")}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'father_name') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'gender_id') !!}"> 
            {!! Form::select('gender_id', [''=>__('Select Gender')]+$genders, null, array('class'=>'form-control', 'id'=>'gender_id')) !!}
            <label>{{__('Select Gender')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'gender_id') !!} </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'email') !!}"> 
            {!! Form::text('email', null, array('class'=>'form-control', 'id'=>'email')) !!}
            <label>{{__('Email')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'email') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'password') !!}"> 
            {!! Form::password('password', array('class'=>'form-control', 'id'=>'password')) !!}
            <label>{{__('Password')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'password') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'date_of_birth') !!}"> 
            <?php $date_of_birth = \Carbon\Carbon::parse((isset($user) && $user->date_of_birth != '') ? $user->date_of_birth: '')->format('Y-m-d'); ?> 
            {!! Form::text('date_of_birth', $date_of_birth, array('class'=>'form-control datepicker-birthday', 'id'=>'date_of_birth', 'autocomplete'=>'off')) !!}
            <label>{{__('Date of Birth')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'date_of_birth') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'marital_status_id') !!}"> 
            {!! Form::select('marital_status_id', [''=>__('Select Marital Status')]+$maritalStatuses, null, array('class'=>'form-control', 'id'=>'marital_status_id')) !!}
            <label>{{__('Select Marital Status')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'marital_status_id') !!} 
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 hidden">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'country_id') !!}">
            <?php $country_id = old('country_id', (isset($user) && (int) $user->country_id > 0) ? $user->country_id : $siteSetting->default_country_id); ?>            
            {!! Form::select('country_id', [''=>__('Select Country')]+$countries, $country_id, array('class'=>'form-control', 'id'=>'country_id')) !!}
            <label>{{__('Select Country')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'country_id') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'state_id') !!}"> 
            <span id="state_dd">
                {!! Form::select('state_id', [''=>__('Select State')], null, array('class'=>'form-control', 'id'=>'state_id')) !!} 
                <label>{{__('Select State')}}</label>
            </span>
             {!! APFrmErrHelp::showErrors($errors, 'state_id') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'city_id') !!}"> 
            <span id="city_dd">
                {!! Form::select('city_id', [''=>__('Select City')], null, array('class'=>'form-control', 'id'=>'city_id')) !!} 
                <label>{{__('City')}}</label>
            </span>
            {!! APFrmErrHelp::showErrors($errors, 'city_id') !!} 
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'nationality_id') !!}"> 
            {!! Form::select('nationality_id', [''=>__('Select Nationality')]+$nationalities, $siteSetting->default_country_id, array('class'=>'form-control', 'id'=>'nationality_id')) !!}
            <label>{{__('Select Nationality')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'nationality_id') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'national_id_card_number') !!}"> 
            {!! Form::text('national_id_card_number', null, array('class'=>'form-control', 'id'=>'national_id_card_number')) !!}
            <label>{{__('National ID Card#')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'national_id_card_number') !!} </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'phone') !!}"> 
            {!! Form::text('phone', null, array('class'=>'form-control', 'id'=>'phone', 'minlength'=>'7', 'maxlength'=>'14')) !!}
            <label>{{__('Phone Number')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'phone') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'mobile_num') !!}"> 
            {!! Form::text('mobile_num', null, array('maxlength'=>'11','class'=>'form-control', 'id'=>'mobile_num')) !!}
            <label>{{__('Mobile Number')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'mobile_num') !!} </div>
    </div>
</div>
<div class="row">
    <!-- <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'job_experience_id') !!}"> 
            {!! Form::select('job_experience_id', [''=>__('Select Experience')]+$jobExperiences, null, array('class'=>'form-control', 'id'=>'job_experience_id')) !!}
            <label>{{__('Select Experience')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'job_experience_id') !!} 
        </div> 
    </div> -->
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'industry_id') !!}"> 
            {!! Form::select('industry_id', [''=>__('Select Industry')]+$industries, null, array('class'=>'form-control', 'id'=>'industry_id')) !!}
            <label>{{__('Select Industry')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'industry_id') !!} 
        </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'career_level_id') !!}"> 
            {!! Form::select('career_level_id', [''=>__('Select Career Level')]+$careerLevels, null, array('class'=>'form-control', 'id'=>'career_level_id')) !!}
            <label>{{__('Select Career Level')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'career_level_id') !!} 
        </div>
    </div>
</div>
<div class="row">
    
    <!-- <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'functional_area_id') !!}"> 
            {!! Form::select('functional_area_id', [''=>__('Select Functional Area')]+$functionalAreas, null, array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
            <label>{{__('Select Functional Area')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'functional_area_id') !!} </div>
    </div> -->
    <div class="col-md-6">
        <!-- <div class="formrow {!! APFrmErrHelp::hasError($errors, 'salary_currency') !!}">
            @php
                $salary_currency = Request::get('salary_currency', (isset($user) && !empty($user->salary_currency))? $user->salary_currency:$siteSetting->default_currency_code);
            @endphp
            {!! Form::select('salary_currency', [''=>__('Select Salary Currency')]+$currencies, $salary_currency, array('class'=>'form-control')) !!}
            
            {!! Form::text('salary_currency', $salary_currency, array('class'=>'form-control', 'id'=>'salary_currency', 'autocomplete'=>'off')) !!}
            <label>{{__('Salary Currency')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'salary_currency') !!} 
        </div> -->
    </div>
</div>
<div class="row">

    <!-- <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'current_salary') !!}"> 
            {!! Form::number('current_salary', null, array('min' => '0','class'=>'form-control', 'id'=>'current_salary')) !!}
            <label>{{__('Current Salary')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'current_salary') !!} </div>
    </div>
    <div class="col-md-6">
        <div class="formrow {!! APFrmErrHelp::hasError($errors, 'expected_salary') !!}"> 
            {!! Form::number('expected_salary', null, array('min' => '0','class'=>'form-control', 'id'=>'expected_salary')) !!}
            <label>{{__('Expected Salary')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'expected_salary') !!} </div>
    </div> -->
    
</div>
<div class="row">
    <div class="col-md-12">
        <div class="formrow mb-3 {!! APFrmErrHelp::hasError($errors, 'street_address') !!}"> 
            {!! Form::textarea('street_address', null, array('class'=>'form-control', 'id'=>'street_address')) !!}
            <label>{{__('Street Address')}}</label>
            {!! APFrmErrHelp::showErrors($errors, 'street_address') !!} </div>
    </div>
    <div class="col-md-12">
    <div class="formrow {!! APFrmErrHelp::hasError($errors, 'is_subscribed') !!}">
    <?php
	$is_checked = 'checked="checked"';	
	if (old('is_subscribed', ((isset($user)) ? $user->is_subscribed : 1)) == 0) {
		$is_checked = '';
	}
	?>
      <input type="checkbox" value="1" name="is_subscribed" {{$is_checked}} />
      {{__('Subscribe to news letter')}}
      {!! APFrmErrHelp::showErrors($errors, 'is_subscribed') !!}
      </div>
  </div>
    <div class="col-md-12">
        <div class="formrow"><button type="submit" class="btn btn-primary round">{{__('Update Profile')}}  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button></div>
    </div>

</div>
{!! Form::close() !!}
<hr>
@push('styles')
<style type="text/css">
    .datepicker>div {
        display: block;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        initdatepicker();
        $('#salary_currency').typeahead({
            source: function (query, process) {
                return $.get("{{ route('typeahead.currency_codes') }}", {query: query}, function (data) {
                    data = $.parseJSON(data);
                    return process(data);
                });
            }
        });

        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterCities(0);
        });
        filterStates(<?php echo old('state_id', (isset($user)) && (int)$user->state_id > 0 ? $user->state_id : $siteSetting->default_state_id ); ?>);
    
        /*******************************/
        var fileInput = document.getElementById("image");
        fileInput.addEventListener("change", function (e) {
            var files = this.files
            showThumbnail(files)
        }, false)
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
    });

    function filterStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != '') {
            $.post("{{ route('filter.lang.states.dropdown') }}", {country_id: country_id, state_id: state_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#state_dd').html(response);
                        filterCities(<?php echo old('city_id', $user->city_id); ?>);
                        $('#state_dd').append('<label>{{__('Province')}}</label>');
                    });
        }
    }
    function filterCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != '') {
            $.post("{{ route('filter.lang.cities.dropdown') }}", {state_id: state_id, city_id: city_id, _method: 'POST', _token: '{{ csrf_token() }}'})
                    .done(function (response) {
                        $('#city_dd').html(response);
                        $('#city_dd').append('<label>{{__('City')}}</label>');
                    });
        }
    }
    function initdatepicker() {
        $(".datepicker").datepicker({
            autoclose: true,    
            format: 'yyyy-m-d',
            max: 0
        });
    }
    $('#first_name,#middle_name,#last_name').bind('keypress', function (event) {
        var regex = new RegExp("^[a-zA-Z0-9 ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
        event.preventDefault();
        return false;
        }
    });  
</script> 
@endpush            