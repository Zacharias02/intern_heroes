<?php
if (!isset($seo)) {
    $seo = (object) array('seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => '');
}
?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="{{ (session('localeDir', 'ltr'))}}" dir="{{ (session('localeDir', 'ltr'))}}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $seo->seo_title }}</title>
        @if((isset($jobs) && isset($job)) == true)<!--outside-->
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta name="Description" content="Job hunting is always a struggle. It takes a lot of time and effort to go outside just to look for a job. But now, as we’re going digital, job search and career improvement becomes struggle-free.">
        <meta name="Keywords" content="Jobs in Philippines, Philippines Jobs, Philippine Employment Administration, Works in Quezon City, Jobs around Quezon City, Jobs, Employment Guidelines, Job, Call center Jobs, BPO jobs, ITJobs, Employer, Find Job, Job Search, Job Vacancy, Job Opening,Job Recruitment, Jobseeker, Resume, Job Ads, Job Employment, Jobs in Quezon City, Quezon City Jobs, Works  near Quezon City,Job Openings, Job Openings in Quezon City, Job Openings in the Philippines, Jobs PH, Job search , Search engine for jobs, Job search engine, Job listings, Search jobs, Career, Employment, Work, Find jobs, Linkedin, IT Companies, IT Companies in Quezon City, IT Companies in the Philippines, Companies, BPO Companies, Fresh Graduate, Jobs for Fresh Graduates, Career Jobs">   
        <meta property="og:title" content="Quezon City Jobs in the Philippines | Job Hiring | Jobbie.ph"/>
        <meta property="og:description" content="Job hunting is always a struggle. It takes a lot of time and effort to go outside just to look for a job. But now, as we’re going digital, job search and career improvement becomes struggle-free."/>
        @elseif((!isset($jobs) && isset($job)) == true)<!--inside-->
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta property="og:title" content="{!! strip_tags($job->title) !!}"/>
        <meta property="og:description" content="{!! strip_tags($job->description) !!}"/>
        @elseif((isset($companies) && isset($company)) == true)<!--outside-->
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta name="Description" content="Choosing companies will never be a problem. We do have bunch of partnered Companies that offers various jobs for you!">
        <meta name="Keywords" content="Jobs in Philippines, Philippines Jobs, Philippine Employment Administration, Works in Quezon City, Jobs around Quezon City, Jobs, Employment Guidelines, Job, Call center Jobs, BPO jobs, IT Jobs, Employer, Find Job, Job Search, Job Vacancy, Job Opening, Job Recruitment, Jobseeker, Resume, Job Ads, Job Employment, Jobs in Quezon City, Quezon City Jobs, Works  near Quezon City, Job Openings, Job Openings in Quezon City, Job Openings in the Philippines, Jobs PH, Jobsearch , Search engine for jobs, Job search engine, Job listings, Search jobs, Career, Employment, Work, Find jobs, Linkedin, IT Companies, IT Companies in Quezon City, IT Companies in the Philippines, Companies, BPO Companies, Fresh Graduate, Jobs for Fresh Graduates, Career Jobs">   
        <meta property="og:title" content="Companies Hiring Online Philippines | Jobbie.ph"/>
        <meta property="og:description" content="Choosing companies will never be a problem. We do have bunch of partnered Companies that offers various jobs for you!">
        @elseif((!isset($companies) && isset($company)) == true)<!--inside-->
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta property="og:title" content="{!! strip_tags($company->name) !!}"/>
        <meta property="og:description" content="{!! strip_tags($company->description) !!}"/>
        <title>Jobbie.ph – Contact us in Philippines</title>
        <meta name="Description" content="Ready to be Jobbielized? Get in touch with us as we connect you to your dream workplace!"/>
        <meta name="Keywords" content="Jobs in Philippines, Philippines Jobs, Philippine Employment Administration, Works in Quezon City, Jobs around Quezon City, Jobs, Employment Guidelines, Job, Call center Jobs, BPO jobs, IT Jobs, Employer, Find Job, Job Search, Job Vacancy, Job Opening, Job Recruitment, Jobseeker, Resume, Job Ads, Job Employment, Jobs in Quezon City, Quezon City Jobs, Works  near Quezon City, Job Openings, Job Openings in Quezon City, Job Openings in the Philippines, Jobs PH, Jobsearch , Search engine for jobs, Job search engine, Job listings, Search jobs, Career, Employment, Work, Find jobs, Linkedin, IT Companies, IT Companies in Quezon City, IT Companies in the Philippines, Companies, BPO Companies, Fresh Graduate, Jobs for Fresh Graduates, Career Jobs">
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta property=”og:title” content="Jobbie.ph – Contact us in Philippines"/>
        <meta property="og:description" content="Ready to be Jobbielized? Get in touch with us as we connect you to your dream workplace!"/>
        @elseif(Request::url() == url('/').'/cms/about-us')
        <meta name="Description" content="Find your desired job as fast, easy and convenience as you can with the help of Jobbie Portal. Start being stable, jobseekers!"/>
        <meta name="Keywords" content="Jobs in Philippines, Philippines Jobs, Philippine Employment Administration, Works in Quezon City, Jobs around Quezon City, Jobs, Employment Guidelines, Job, Call center Jobs, BPO jobs, IT Jobs, Employer, Find Job, Job Search, Job Vacancy, Job Opening, Job Recruitment, Jobseeker, Resume, Job Ads, Job Employment, Jobs in Quezon City, Quezon City Jobs, Works  near Quezon City, Job Openings, Job Openings in Quezon City, Job Openings in the Philippines, Jobs PH, Jobsearch , Search engine for jobs, Job search engine, Job listings, Search jobs, Career, Employment, Work, Find jobs, Linkedin, IT Companies, IT Companies in Quezon City, IT Companies in the Philippines, Companies, BPO Companies, Fresh Graduate, Jobs for Fresh Graduates, Career Jobs">
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta property=”og:title” content="Jobbie.ph – Contact us in Philippines"/>
        <meta property="og:description" content="Find your desired job as fast, easy and convenience as you can with the help of Jobbie Portal. Start being stable, jobseekers!"/>
        @else
        <meta property="og:image" content="/images/ogimg.png"/>
        <meta property=”og:title” content="{!! strip_tags($seo->seo_title) !!}"/>
        <meta property="og:description" content="{!! strip_tags($seo->seo_description) !!}"/>
        <meta name="Description" content="Jobbie a job portal that connects both employers and applicants by providing you your employment needs. We help you get your next job and employee in the most labor-saving way.">
        <meta name="Keywords" content="Jobs in Philippines, Philippines Jobs, Philippine Employment Administration, Works in Quezon City, Jobs around Quezon City, Jobs, Employment Guidelines, Job, Call center Jobs, BPO jobs, IT Jobs, Employer, Find Job, Job Search, Job Vacancy, Job Opening, Job Recruitment, Jobseeker, Resume, Job Ads, Job Employment, Jobs in Quezon City, Quezon City Jobs, Works  near Quezon City, Job Openings, Job Openings in Quezon City, Job Openings in the Philippines, Jobs PH, Job search , Search engine for jobs, Job search engine, Job listings,">   
        @endif

        {!! $seo->seo_other !!}
        <!-- Manifest -->
        <link rel="manifest" href="{{asset('/')}}manifest.json">
        <!-- Fav Icon -->
        <link rel="shortcut icon" href="{{asset('/')}}favicon.ico">
        <!-- Slider -->
        <link href="{{asset('/')}}js/revolution-slider/css/settings.css" rel="stylesheet">
        <!-- Owl carousel -->
        <link href="{{asset('/')}}css/owl.carousel.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{asset('/')}}css/font-awesome.css" rel="stylesheet">
        <!-- Custom Style -->
        <link href="{{asset('/')}}css/main.css" rel="stylesheet">
        <!-- Custom modified style -->
        <link href="{{asset('/')}}css/custom.css" rel="stylesheet">
        <!-- Responsive style -->
        <link href="{{asset('/')}}css/responsive.css" rel="stylesheet">
        @if((session('localeDir', 'ltr') == 'rtl'))
        <!-- Rtl Style -->
        <link href="{{asset('/')}}css/rtl-style.css" rel="stylesheet">
        @endif
        <link href="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="{{asset('/')}}js/html5shiv.min.js"></script>
          <script src="{{asset('/')}}js/respond.min.js"></script>
        <![endif]-->
        <!-- Google AdSense -->
        @stack('styles')
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-8043118148741429",
            enable_page_level_ads: true
        });
        </script>
    </head>
    <body>
        @yield('content') 
        <!--Sharethis JS-->
        <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c8f044160a1220011b6f984&product=inline-share-buttons' async='async'></script>
        <!--Moment JS-->
        <script src="{{asset('/')}}js/moment.js"></script>
        <!-- Bootstrap's JavaScript --> 
        <script src="{{asset('/')}}js/jquery-2.1.4.min.js"></script> 
        <script src="{{asset('/')}}js/bootstrap.min.js"></script> 
        <!-- Owl carousel --> 
        <script src="{{asset('/')}}js/owl.carousel.js"></script> 
        <script src="{{asset('/')}}js/range.slider.js"></script> 
        <script src="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script> 
        <script src="{{ asset('/') }}admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script> 
        <!-- END PAGE LEVEL PLUGINS --> 
        <script src="{{ asset('/') }}admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="{{ asset('/') }}admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
        <!-- Revolution Slider --> 
        <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.tools.min.js"></script> 
        <script type="text/javascript" src="{{ asset('/') }}js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>
        {!! NoCaptcha::renderJs() !!}
        @stack('scripts')
        <!-- Custom js --> 
        <script src="{{asset('/')}}js/script.js"></script>
        <script type="text/JavaScript">
            $(document).ready(function(){
            $(document).scrollTo('.has-error', 2000);
            });
            function showProcessingForm(btn_id){		
            $("#"+btn_id).val( 'Processing .....' );
            $("#"+btn_id).attr('disabled','disabled');		
            }
        </script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5c7f85323341d22d9ce7968f/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
        </script>
        <!--End of Tawk.to Script-->
    </body>
</html>
