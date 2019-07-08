<div class="testimonials_section">
<div class="section">
    <div class="container"> 
        <!-- title start -->
        <div class="titleTop align-center">
            <!-- <div class="subtitle">{{__('Here You Can See')}}</div> -->
            <h3><span>{{__('TESTIMONIALS')}} </span></h3>
            <h3>{{__('Success Stories')}} </h3>
        </div>
        <!-- title end -->
        <div class="row">
            <div class="testimonials">
                <div class="col-md-6">
                    <div class="images">
                        <span class='step-3' style='background-image: url(https://www.icescrum.com/wp-content/uploads/2018/11/olivier_audouze.png)'></span>
                        <span class='step-2' style='background-image: url(https://www.icescrum.com/wp-content/uploads/2018/11/logo-airbus.png)'></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="qoute-icon">
                    </div>
                    <div class="texts">
                        @if(isset($testimonials) && count($testimonials))
                            @foreach($testimonials as $testimonial)
                            <div class=''>
                                <div class='text'>{{$testimonial->testimonial}}</div>
                                <div class='who'>{{$testimonial->testimonial_by}}</div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="selectors">
                        @if(isset($testimonials) && count($testimonials))
                            @foreach($testimonials as $testimonial)
                                <span class=''></span>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
       <!--  <ul class="testimonialsList">
            @if(isset($testimonials) && count($testimonials))
            @foreach($testimonials as $testimonial)
            <li class="item">      
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6">
                        <p>"{{$testimonial->testimonial}}"</p>
                        <div class="clientname">{{$testimonial->testimonial_by}}</div>
                        <div class="clientinfo">{{$testimonial->company}}</div>
                    </div>
                </div>  
                
            </li>
            @endforeach
            @endif
        </ul> -->
    </div>
</div>
</div>