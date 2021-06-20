<x-user-layout>
    <div>
    <section class="ls page_portfolio mt-3">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <h2 class="text-center" style="margin-bottom: 0 !important">{{__('general.pkps-title')}}</h2>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <h3 class="text-center ">
                    {{__('general.pkps-subtitle-1')}}
                </h3>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">

                <div class="col-md-6 col-sm-12 img vertical-center vh60">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/1.JPG')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text">
                    {!! __('general.pkps-desc-1') !!}
                </div>

            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 img vertical-center vh60 in-desktop">
                            <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                                 style=" transform: scaleX(-1);" alt="">
                            <img src="{{asset('user/images/about/koperasi/2.JPG')}}" class="border-image" alt="">
                        </div>
                        <div class="col-md-6 col-sm-12 text">
                            {!! __('general.pkps-desc-2') !!}
                        </div>
                        <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                            <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                                 style=" transform: scaleX(-1);" alt="">
                            <img src="{{asset('user/images/about/koperasi/2.JPG')}}" class="border-image" alt="">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12 text text-center">
                    <h3 class="text-center">{{__('general.pkps-visi')}}</h3>
                    <p class="text-center">
                        {{__('general.pkps-visi-desc')}}
                    </p>
                    <h3 class="text-center">{{__('general.pkps-misi')}}</h3>
                    <ul class="text-center">
                        {{__('general.pkps-misi-desc')}}
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12 text text-center">
                    <h3 class="text-center">{{__('general.pkps-business')}}</h3>
                    <ul class="text-center">
                        {{__('general.pkps-business-point')}}
                    </ul>
                    {{__('general.pkps-desc-3')}}
                </div>

            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">

            <div class="row" style="margin-top: 10px">

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="section_header text-center">
                            {{__('general.pkps-value')}}
                        </h2>
                    </div>
                    <div class="col-md-6 col-sm-12 img vertical-center vh60">
                        <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                             style=" transform: scaleX(-1);" alt="">
                        <img src="{{asset('user/images/about/koperasi/3.JPG')}}" class="border-image" alt="">
                    </div>
                    <!-- .col-* -->
                    <div class="col-md-6 ">

                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-parent="#accordion1"
                                           data-toggle="collapse" href="#collapse1">
                                            <i class="fa fa-envelope"></i>
                                            {{__('general.pkps-value-1')}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse1">
                                    <div class="panel-body">
                                        {{__('general.pkps-value-1-desc')}}
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-parent="#accordion2"
                                           data-toggle="collapse" href="#collapse2">
                                            <i class="fa fa-envelope"></i>
                                            {{__('general.pkps-value-2')}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapse2">
                                    <div class="panel-body">
                                        {{__('general.pkps-value-2-desc')}}
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-parent="#accordion3"
                                           data-toggle="collapse" href="#collapse3">
                                            <i class="fa fa-envelope"></i>
                                            {{__('general.pkps-value-3')}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse " id="collapse3">
                                    <div class="panel-body">
                                        {{__('general.pkps-value-3-desc')}}
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-parent="#accordion4"
                                           data-toggle="collapse" href="#collapse4">
                                            <i class="fa fa-envelope"></i>
                                            {{__('general.pkps-value-4')}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse " id="collapse4">
                                    <div class="panel-body">
                                        {{__('general.pkps-value-4-desc')}}
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-parent="#accordion5"
                                           data-toggle="collapse" href="#collapse5">
                                            <i class="fa fa-envelope"></i>
                                            {{__('general.pkps-value-5')}}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse " id="collapse5">
                                    <div class="panel-body">
                                        {{__('general.pkps-value-5-desc')}}
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <h3 class="text-center ">
                    {{__('general.pkps-service')}}
                </h3>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-desktop">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/5.JPG')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-service-1')}}</b><br>
                        {{__('general.pkps-service-1-desc')}}
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/5.JPG')}}" class="border-image" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/5.JPG')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-service-2')}}</b><br>
                        {{__('general.pkps-service-2-desc')}}
                    </p>
                </div>

            </div>
        </div>
    </section>
    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-desktop">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/6.JPG')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-service-3')}}</b><br>
                        {{__('general.pkps-service-3-desc')}}
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/6.JPG')}}" class="border-image" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <h3 class="text-center ">
                    {{__('general.pkps-product')}}
                </h3>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-desktop">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/7.JPG')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-product-1')}}</b><br>
                        {{__('general.pkps-product-1-desc')}}
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/7.JPG')}}" class="border-image" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/8.jpg')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-product-2')}}</b><br>
                        {{__('general.pkps-product-2-desc')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-desktop">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/9.png')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-product-3')}}</b><br>
                        {{__('general.pkps-product-3-desc')}}
                    </p>
                </div>
                <div class="col-md-6 col-sm-12 img vertical-center vh60 in-mobile">
                    <img src="{{asset('user/images/about-bg/koperasi.svg')}}" class="back-bg-cooperation"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('user/images/about/koperasi/9.png')}}" class="border-image" alt="">
                </div>
            </div>
        </div>
    </section>

    <section class="ls page_portfolio">
        <div class="container">
            <div class="row" style="margin-top: 10px">
                <div class="col-md-6 col-sm-12 img vertical-center vh60">
                    <img src="{{asset('image/about-bg/koperasi.svg')}}" class="back-bg-academy"
                         style=" transform: scaleX(-1);" alt="">
                    <img src="{{asset('image/about/blog.jpg')}}" class="border-image" alt="">
                </div>
                <div class="col-md-6 col-sm-12 text vertical-center vh60">
                    <p>
                        <b>{{__('general.pkps-product-4')}}</b><br>
                        {{__('general.pkps-product-4-desc')}}
                    </p>
                </div>
            </div>
        </div>
    </section>
    </div>
</x-user-layout>
