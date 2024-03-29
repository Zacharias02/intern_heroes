@extends('layouts.app')
@section('content') 
<!-- Header start --> 
@include('includes.header') 
<!-- Header end --> 
<!-- Inner Page Title start --> 
@include('includes.inner_page_title', ['page_title'=>__('All Companies')]) 
<!-- Inner Page Title end -->

<div class="listpgWraper">
<div class="container">
    <ul class="row compnaieslist">
        @if($companies)
        @foreach($companies as $company)
        <li class="col-md-3 col-sm-6">
            <a href="{{route('company.detail',$company->slug)}}">
                <div class="compint">
                <div class="imgwrap">
                    <span style="background-image: url({{$company->getCompanyImage()}});"></span>
                    <span class="blur-background" style="background-image: url({{$company->getCompanyImage()}});"></span>
                </div>
                <h3>
                    {{$company->name}}
                </h3>
                <div class="loctext"><i class="fa fa-map-marker" aria-hidden="true"></i> {{$company->location}}</div>
                <div class="curentopen"><i class="fa fa-black-tie" aria-hidden="true"></i> {{__('Current Internships')}} : {{$company->countNumJobs('company_id',$company->id)}}</div>
                </div>
            </a>
        </li>
        @endforeach
        @endif

    </ul>
    <div class="pagiWrap">
       {{ $companies->links() }}
        
    </div>
</div>
</div>

@include('includes.footer')
@endsection
@push('styles')
<style type="text/css">
    .formrow iframe {
        height: 78px;
    }
</style>
@endpush
@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_company_message', function () {
            var postData = $('#send-company-message-form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('contact.company.message.send') }}",
                data: postData,
                //dataType: 'json',
                success: function (data)
                {
                    response = JSON.parse(data);
                    var res = response.success;
                    if (res == 'success')
                    {
                        var errorString = '<div role="alert" class="alert alert-success">' + response.message + '</div>';
                        $('#alert_messages').html(errorString);
                        $('#send-company-message-form').hide('slow');
                        $(document).scrollTo('.alert', 2000);
                    } else
                    {
                        var errorString = '<div class="alert alert-danger" role="alert"><ul>';
                        response = JSON.parse(data);
                        $.each(response, function (index, value)
                        {
                            errorString += '<li>' + value + '</li>';
                        });
                        errorString += '</ul></div>';
                        $('#alert_messages').html(errorString);
                        $(document).scrollTo('.alert', 2000);
                    }
                },
            });
        });
    });
</script> 
@endpush