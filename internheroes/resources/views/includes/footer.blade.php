<!--Footer-->
<!-- <div class="largebanner shadow3">
<div class="adin">
{!! $siteSetting->above_footer_ad !!}
</div>
<div class="clearfix"></div>
</div>
 -->

<div class="footerWrap"> 
    <div class="container">
        <div class="row"> 
            <div class="col-md-3">
                <div class="row">
                    <!--Quick Links-->
                    <div class="col-md-12 col-sm-12">
                        <h5>{{__('Quick Links')}}</h5>
                        <!--Quick Links menu Start-->
                        <ul class="quicklinks">
                            <li><a href="{{ route('index') }}">{{__('Home')}}</a></li>
                            <li><a href="{{ route('contact.us') }}">{{__('Contact Us')}}</a></li>
                            <li class="postad"><a href="{{ route('post.job') }}">{{__('Post Internship')}}</a></li>
                            <li><a href="{{ route('faq') }}">{{__('FAQs')}}</a></li>
                            @foreach($show_in_footer_menu as $footer_menu)
                            @php
                            $cmsContent = App\CmsContent::getContentBySlug($footer_menu->page_slug);
                            @endphp

                            <li class="{{ Request::url() == route('cms', $footer_menu->page_slug) ? 'active' : '' }}"><a href="{{ route('cms', $footer_menu->page_slug) }}">{{ $cmsContent->page_title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!--Quick Links menu end-->

                    <!-- <div class="col-md-6 col-sm-6">
                        <h5>{{__('Jobs By Functional Area')}}</h5>
                        <ul class="quicklinks">
                            @php
                            $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                            @endphp
                            @foreach($functionalAreas as $functionalArea)
                            <li><a href="{{ route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}</a></li>
                            @endforeach
                        </ul>
                    </div> -->
                </div>
            </div>

            <!-- <div class="col-md-3">
                <div class="row">
                    Jobs By Functional Area
                    <div class="col-md-12">
                            <h5>{{__('Internship By Functional Area')}}</h5>
                            Functional Area menu Start
                            <ul class="quicklinks industry">
                                @php
                                $functionalAreas = App\FunctionalArea::getUsingFunctionalAreas(10);
                                @endphp
                                @foreach($functionalAreas as $functionalArea)
                                <li><a href="{{ route('job.list', ['functional_area_id[]'=>$functionalArea->functional_area_id]) }}">{{$functionalArea->functional_area}}</a></li>
                                @endforeach
                            </ul>
                            Functional Area menu End
                            <div class="clear"></div>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6">
                <div class="row">
                    <!--Jobs By Industry-->
                    <div class="col-md-12">
                            <h5>{{__('Internship By Industry')}}</h5>
                            <!--Industry menu Start-->
                            <ul class="quicklinks industry">
                                @php
                                $industries = App\Industry::getUsingIndustries(12);
                                @endphp
                                @foreach($industries as $industry)
                                <li><a href="{{ route('job.list', ['industry_id[]'=>$industry->industry_id]) }}">{{$industry->industry}}</a></li>
                                @endforeach
                            </ul>
                            <!--Industry menu End-->
                            <div class="clear"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="row">
                    <!--About Us-->
                    <div class="col-md-12">
                        <h5>{{__('Contact Us')}}</h5>
                        <div class="address">{{ $siteSetting->site_street_address }}</div>
                        <div class="email"> <a href="mailto:{{ $siteSetting->mail_to_address }}">{{ $siteSetting->mail_to_address }}</a> </div>
                        <div class="phone"> <a href="tel:{{ $siteSetting->site_phone_primary }}">{{ $siteSetting->site_phone_primary }}</a></div>
                        <!-- Social Icons -->
                        <div class="social">@include('includes.footer_social')</div>
                        <!-- Social Icons end --> 

                    </div>
                    <!--About us End--> 
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-md-12">
                <!--Copyright-->
                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="bttxt">&copy; {{__('Copyright')}} {{ $siteSetting->site_name }} {{date('Y')}}. {{__('All rights reserved')}}.</div>
                            </div>
                            <div class="col-md-4">
                                <div class="bttxt text-right">Powered by <a href="http://leentechsystems.com/">LEENTech Network Solution, Inc.</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Footer end--> 

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-UA-136080985-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136080985-1');
</script>
