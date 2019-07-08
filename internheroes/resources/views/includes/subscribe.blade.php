<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-md-3 hidden-xs hidden-sm">
                <div class="subscribe-employee-icon">
                </div>
            </div>
            <div class="col-md-9">
                <div class="subscribe-form">
                    <h6 class="text-left">{{__('SUBSCRIBE TO OUR NEWSLETTER')}}</h6> 
                    <p class="text-left">{{__('On the other hand, we denounce with righteous indignation and dislike men.')}}</p>
                    <div id="alert_messages"></div>       
                        <form method="post" action="{{ route('subscribe.newsletter')}}" name="subscribe_newsletter_form" id="subscribe_newsletter_form">
                            {{ csrf_field() }}		   
                            <div class="row">
                                <div class="col-md-4 col-sm-4"><input type="text" class="form-control" placeholder="{{__('Your Name')}}" name="name" id="name" required="required"></div>
                                <div class="col-md-5 col-sm-5"><input type="text" class="form-control" placeholder="{{__('Your Email')}}" name="email" id="email" required="required"></div>
                                <div class="col-md-3 col-sm-3 "><button class="btn btn-primary btn-large round text-uppercase" type="button" id="send_subscription_form">{{__('Subscribe')}}</button></div>		 
                            </div>
                        </form>         
                    </div>
                </div>
            </div>
        </div>
</div>

<!--<div class="section greybg">
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10 align-center">{!! $siteSetting->index_page_below_subscribe_ad !!}</div>
    <div class="col-md-1"></div>
  </div>
</div>-->


@push('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '#send_subscription_form', function () {
            var postData = $('#subscribe_newsletter_form').serialize();
            $.ajax({
                type: 'POST',
                url: "{{ route('subscribe.newsletter') }}",
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
                        $('#subscribe_newsletter_form').hide('slow');
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