@extends('layouts.app')
@section('content')
<!-- Header start -->
@include('includes.header')
<!-- Header end --> 
<!-- Search start -->
@include('includes.search')
<!-- Search End --> 
<!-- Top Employers start -->
@include('includes.top_employers')
<!-- Top Employers ends --> 

<!-- Popular Searches start -->
@include('includes.popular_searches')
<!-- Popular Searches ends --> 

<!-- Featured Jobs start -->
@include('includes.featured_jobs')
<!-- Featured Jobs ends --> 

<!-- How it Works start -->
@include('includes.how_it_works')
<!-- How it Works Ends -->

<!-- Latest Jobs start -->
@include('includes.latest_jobs')
<!-- Latest Jobs ends --> 



<!-- Video start -->

<!-- Video end --> 

<!-- Testimonials start -->
@include('includes.testimonials')
<!-- Testimonials End -->

<!-- Subscribe start -->
@include('includes.subscribe')
<!-- Subscribe End -->
@include('includes.footer')
@endsection
@push('scripts') 
@include('includes.country_state_city_js')
<script>
    $(document).ready(function () {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
    });
    $(document).ready(function () {
        var $testimonials = $('.testimonials');
        if ($testimonials.length > 0) {
            $('.texts > div:first-child').addClass('show');
            $('.selectors > span:first-child').addClass('show');
            setInterval(function() {
                $testimonials.find('.images span').each(function() {
                    var $this = $(this);
                    // if ($this.hasClass('step-0')) {
                    //     $this.removeClass('step-0').addClass('step-1');
                    // } else if ($this.hasClass('step-1')) {
                    //     $this.removeClass('step-1').addClass('step-2');
                    // } else 
                    if ($this.hasClass('step-2')) {
                        $this.removeClass('step-2').addClass('step-3');
                    } else if ($this.hasClass('step-3')) {
                        $this.removeClass('step-3').addClass('step-2');
                    } 
                    // else if ($this.hasClass('step-4')) {
                    //     $this.removeClass('step-4').addClass('step-0');
                    // }
                });
                var index = $testimonials.find('.images span.step-3').index();
                $testimonials.find('.selectors > span').each(function() {
                    var $this = $(this);
                    if ($this.index() === index) {
                        $this.addClass('show');
                    } else {
                        $this.removeClass('show');
                    }
                });
                $testimonials.find('.texts > div').each(function() {
                    var $this = $(this);
                    if ($this.index() === index) {
                        $this.addClass('show');
                    } else {
                        $this.removeClass('show');
                    }
                });
            }, 10000);
        }
    });
</script>
@endpush
