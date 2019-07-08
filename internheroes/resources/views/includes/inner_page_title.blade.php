<div class="pageTitle">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <h1 class="page-heading">{{$page_title}}</h1>
                <p>{{__('Explore, learn, and grow while during the best work of your life.')}}</p>
            </div>
            <?php
            if (!strpos(url()->current(), 'view-public-profile') !== false) {
                ?>
                <div class="col-md-6 col-sm-6 hidden">
                    <div class="breadCrumb"><a href="{{route('index')}}">{{__('Home')}}</a> / <span>{{$page_title}}</span></div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>