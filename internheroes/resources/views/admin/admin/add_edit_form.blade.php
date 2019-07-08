@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Please check the following:</strong>
<br/>
@foreach ($errors->all() as $error)
<ul>
    <li>{{ $error }}</li>
</ul>
@endforeach
@endif
@include('flash::message')
</div>
<div class="form-body">
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'name') !!}">
        {!! Form::label('name', 'Name', ['class' => 'bold']) !!}                    
        {!! Form::text('name', null, array('required', 'class'=>'form-control', 'placeholder'=>'Name')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'name') !!}                                       
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'email') !!}">
        {!! Form::label('email', 'Email Address', ['class' => 'bold']) !!}
        {!! Form::text('email', null, array('required', 'class'=>'form-control', 'placeholder'=>'Email Address')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'email') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'password') !!}">
        {!! Form::label('password', 'Password', ['class' => 'bold']) !!}
        {!! Form::password('password', array('required', 'class'=>'form-control', 'placeholder'=>'Password')) !!}
        {!! APFrmErrHelp::showErrors($errors, 'password') !!}
    </div>
    <div class="form-group {!! APFrmErrHelp::hasError($errors, 'role_id') !!}">
        {!! Form::label('role', 'Role', ['class' => 'bold']) !!}
        {!! Form::select('role_id', ['' => 'Select a Role']+$roles, null, ['class' => 'form-control', 'style' => 'width:auto !important;']) !!}
        {!! APFrmErrHelp::showErrors($errors, 'role_id') !!}
    </div>
</div>