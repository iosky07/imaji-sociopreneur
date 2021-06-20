<x-user-layout>
    <x-slot name="script">
        <script>
            $(document).ready(function () {
                var imaji = {{Helper::getHome()->number_imaji_academy}};
                var number1 = $('#imaji').text();
                var interval1 = setInterval(function () {
                    $('#imaji').text(number1);
                    if (number1 >= imaji) clearInterval(interval1);
                    number1++;
                }, 100);

                var bank = {{Helper::getHome()->number_garbage_bank}};
                var number2 = $('#bank').text();
                var interval2 = setInterval(function () {
                    $('#bank').text(number2);
                    if (number2 >= bank) clearInterval(interval2);
                    number2++;
                }, 60);

                var cooperation = {{Helper::getHome()->number_cooperation}};
                var number3 = $('#cooperation').text();
                var interval3 = setInterval(function () {
                    $('#cooperation').text(number3);
                    if (number3 >= cooperation) clearInterval(interval3);
                    number3++;
                }, 100);

                var village = {{Helper::getHome()->number_village}};
                var number4 = $('#village').text();
                var interval4 = setInterval(function () {
                    $('#village').text(number4);
                    if (number4 >= village) clearInterval(interval4);
                    number4++;
                }, 100);

                var community = {{Helper::getHome()->number_public_community}};
                var number5 = $('#community').text();
                var interval5 = setInterval(function () {
                    $('#community').text(number5);
                    if (number5 >= community) clearInterval(interval5);
                    number5++;
                }, 0.1);
            });
        </script>
    </x-slot>
    <div>
        <section class="intro_section page_mainslider ds">
            <div class="flexslider" data-dots="false">
                <ul class="slides">
                    @foreach($sliders as $slider)
                        <li>
                            <img alt="" src="{{asset('storage/'.$slider->thumbnail)}}">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <div class="slide_description_wrapper">
                                            <div class="slide_description">
                                                <div class="intro-layer" data-animation="fadeInRight">
                                                    <h3 class="highlight">
                                                        {{$slider->{'title_'.request()->segment(1)} }}
                                                    </h3>
                                                    <br><br>
                                                    <div class="intro-layer mt-5" data-animation="fadeInRight">
                                                        <a class="theme_button color1"
                                                           href="{{$slider->{'title_'.request()->segment(1)} }}">Baca
                                                            Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- eof .slide_description -->
                                        </div>
                                        <!-- eof .slide_description_wrapper -->
                                    </div>
                                    <!-- eof .col-* -->
                                </div>
                                <!-- eof .row -->
                            </div>
                            <!-- eof .container -->
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="scroll_button_wrap">
                <a class="scroll_button" href="#about">
                    <span class="sr-only">scroll down</span>
                </a>
            </div>
        </section>

        <section class="ls section_padding_50 back1" id="about">
            <div class="container" style="padding-top:10px;padding-bottom:10px;margin-top:0;margin-bottom:0">
                <img src="{{asset('user/images/banner/background.png')}}" alt="">
            </div>
        </section>


        <section class="ls ms section_padding_50 back2" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="section_header with_icon">
                            {{__('general.our-project')}}
                        </h2>
                        <p class="small-text grey">{{__('general.our-project-desc')}}</p>
                    </div>
                </div>
                <div class="row columns_margin_bottom_20">
                    @foreach($projects as $project)
                        <div class="col-md-4 col-sm-6">
                            <article
                                class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                <div class="item-media">
                                    {{--                                <img alt="" src="{{URL::to('/')}}/image/project/{{$project->thumbnail}}">--}}
                                    <img alt="" src="{{asset('storage/'.$project->thumbnail)}}">
                                </div>
                                <div class="item-content">
                                    <h4 class="entry-title">
                                        <a href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}])}}">{{$project->{'title_'.request()->segment(1)} }}</a>
                                    </h4>
                                    <a class="read-more"
                                       href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}])}}"></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="row topmargin_30">
                    <div class="col-sm-12 text-center">
                        <a class="theme_button wide_button color1"
                           href="{{route('project.index',request()->segment(1))}}">{{__('general.our-project-btn')}}</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="ls ms section_padding_50 back2" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="section_header with_icon">
                            {{__('general.our-event')}}
                        </h2>
                        <p class="small-text grey">{{__('general.our-event-desc')}}</p>
                    </div>
                </div>
                <div class="row columns_margin_bottom_20">
                    @foreach($events as $event)
                        <div class="col-md-4 col-sm-6">
                            <article
                                class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                <div class="item-media">
                                    {{--                                <img alt="" src="{{URL::to('/')}}/image/event/{{$event->event_image}}">--}}
                                    <img alt="" src="{{asset('storage/'.$event->thumbnail)}}">
                                </div>
                                <div class="item-content">
                                    <p>{{$event->date_event}}</p>
                                    <h4 class="entry-title">
                                        <a href="{{route('content.show',[request()->segment(1),$event->{'slug_'.request()->segment(1)}])}}">
                                            {{$event->{'title_'.request()->segment(1)} }}
                                        </a>
                                    </h4>
                                    <a class="read-more"
                                       href="{{route('content.show',[request()->segment(1),$event->{'slug_'.request()->segment(1)}])}}"></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="row topmargin_30">
                    <div class="col-sm-12 text-center">
                        <a class="theme_button wide_button color1"
                           href="{{route('event.index',request()->segment(1))}}">{{__('general.our-event-btn')}}</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="ls overflow_hidden half_section section_padding_50 back1">
            <div class="container-fluid back3">
                <div class="row">
                    <div class="col-md-6 row">
                        <div class="col-md-1"></div>
                        <img class="col-md-10" alt="" src="{{asset('user/images/half_image.jpg')}}">
                        <div class="col-md-1"></div>
                    </div>
                    <!-- .col-* -->
                    <div class="col-md-6">
                        <h2 class="section_header with_icon">
                            {{__('general.our-goal')}}
                        </h2>

                        <p style="color: #323232;text-align: justify">
                            {!! __('general.our-goal-desc') !!}
                        </p>

                    </div>
                </div>
            </div>
        </section>


        <section class="ls ms section_padding_50 back4" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="section_header with_icon">
                            {{__('general.our-faq')}}
                        </h2>
                        <p class="small-text grey bottommargin_0">{{__('general.our-faq-desc')}}</p>
                    </div>
                </div>
                <div class="row columns_margin_top_60">
                    @foreach($faqs as $faq)
                        <div class="col-md-4">
                            <div class="teaser with_background rounded text-center">
                                <div class="teaser_icon main_bg_color2 round offset_icon fontsize_30">
                                    <h3 class="margin_0">?</h3>
                                </div>
                                <h4 class="poppins">
                                    {{$faq->{'title_'.request()->segment(1)} }}
                                </h4>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="row topmargin_30">
                    <div class="col-sm-12 text-center">
                        <a class="theme_button color1 wide_button"
                           href="{{route('faq',request()->segment(1))}}">{{__('general.our-faq-btn')}}</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="ls section_padding_100 back5" id="reviews">
            <div class="container">
                <div class="row text-center">
                    <h2 style="color: black;margin-bottom: 10px !important">{{__('general.imaji-in-number')}}</h2>
                    {{--                <p style="color: black;margin-top: 0 !important">Imaji Dalam Angkas dalam</p>--}}
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="text-center">
                                <h2 id="village" class="mb-0" style="color: black;margin-bottom: 0 !important">0</h2>
                                <h4 class="mt-0"
                                    style="color: black;margin-top: 0 !important;">{{__('general.village')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="text-center">
                                <h2 id="bank" class="mb-0" style="color: black;margin-bottom: 0 !important">0</h2>
                                <h4 class="mt-0"
                                    style="color: black;margin-top: 0 !important;">{{__('general.garbage-bank')}}</h4>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="text-center">
                                <h2 id="imaji" class="mb-0" style="color: black;margin-bottom: 0 !important">0</h2>
                                <h4 class="mt-0"
                                    style="color: black;margin-top: 0 !important;">{{__('general.academy')}}</h4>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="text-center">
                                <h2 id="cooperation" class="mb-0" style="color: black;margin-bottom: 0 !important">
                                    0</h2>
                                <h4 class="mt-0"
                                    style="color: black;margin-top: 0 !important;">{{__('general.pkps')}}</h4>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-12">
                            <div class="text-center">
                                <h2 id="community" class="mb-0" style="color: black;margin-bottom: 0 !important">0</h2>
                                <h4 class="mt-0"
                                    style="color: black;margin-top: 0 !important;">{{__('general.society')}}</h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <section class="ls section_padding_100 back6" id="reviews">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <h2 class="section_header with_icon">
                            {{__('general.our-testimoni')}}
                        </h2>
                        <p class="small-text grey">{{__('general.our-testimoni-desc')}}</p>

                        <div class="owl-carousel" data-dots="true" data-responsive-lg="1" data-responsive-md="1"
                             data-responsive-sm="1">
                            @foreach($testimonials as $testimonial)
                                <blockquote class="with_quotes text-center">
                                    <img alt="" src="{{asset('storage/'.$testimonial->thumbnail)}}">
                                    {{--                                {{$testimonial->respon}}--}}
                                    <div class="item-meta">
                                        <h4 class="poppins margin_0">{{$testimonial->name}}</h4>
                                        <h6 class="poppins margin_0">{{$testimonial->position}}</h6>
                                        <br>
                                        <p class="small-text">{{ $testimonial->{'content_'.request()->segment(1)} }}</p>
                                    </div>
                                </blockquote>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="ls ms section_padding_100 back8" id="news">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center with_icon">
                        <h2 class="section_header">
                            {{__('general.our-blog')}}
                        </h2>
                    </div>
                </div>
                <div class="row columns_margin_bottom_20">
                    @foreach($blogs as $blog)
                        <div class="col-md-4 col-sm-6">
                            <article
                                class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                <div class="item-media">
                                    {{--                                <img alt="" src="{{URL::to('/')}}/image/blog/{{$blog->thumbnail}}">--}}
                                    <img alt="" src="{{asset('storage/'.$blog->thumbnail)}}">
                                </div>
                                <div class="item-content">
                                    <h4 class="entry-title">
                                        <a href="{{route('content.show',[request()->segment(1),$blog->{'slug_'.request()->segment(1)}])}}">{{$blog->{'title_'.request()->segment(1)} }}</a>
                                    </h4>
                                    <a class="read-more"
                                       href="{{route('content.show',[request()->segment(1),$blog->{'slug_'.request()->segment(1)} ])}}"></a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <div class="row topmargin_30">
                    <div class="col-sm-12 text-center">
                        <a class="theme_button wide_button color1" href="{{route('blog.index',request()->segment(1))}}">Blog
                            Kami</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="ls ms section_padding_50 back2" id="services">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2 class="section_header with_icon">
                            {{__('general.our-media')}}
                        </h2>
                        <div class="row">
                            @foreach($sosmeds as $sosmed)
                                <div class="col-md-4">
                                    {!! $sosmed->slug !!}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="row topmargin_30">
                    <div class="col-sm-12 text-center">
                        <a class="theme_button wide_button color1"
                           href="https://www.instagram.com/imajisociopreneur/">{{__('general.our-media-btn')}}</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="ls section_padding_50 grad1" id="reviews">
            <div class="container">
                <div class="row mx-auto">
                    <h1 style="color: white">Our Partner</h1>
                    <div class="row ">
                        @foreach($partnersB as $partner)
                            <a href="{{$partner->slug}}" class="col-md-2 col-xs-12 logo-partner-big ">
                                <img src="{{asset('storage/'.$partner->thumbnail)}}"
                                     alt="{{asset('storage/'.$partner->thumbnail)}}" class="mt-auto">
                            </a>
                        @endforeach
                    </div>
                    <div class="row">
                        @foreach($partnersA as $partner)
                            <a href="{{$partner->slug}}" class="col-md-1 col-xs-6 logo-partner-small">
                                <span></span>
                                <img src="{{asset('storage/'.$partner->thumbnail)}}"
                                     alt="{{asset('storage/'.$partner->thumbnail)}}" class="" height=125px>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section class="ls">
            <div class="owl-carousel" data-loop="true" data-margin="0" data-nav="true"
                 data-responsive-lg="8" data-responsive-md="5" data-responsive-sm="3" data-responsive-xlg="8"
                 data-responsive-xs="2">
                @foreach($galleries as $gallery)
                    <div class="vertical-item content-absolute corporate consulting">
                        <div class="item-media">
                            <img alt="" src="{{asset('storage/'.$gallery->thumbnail)}}">
                            <div class="media-links">
                                <a class="abs-link prettyPhoto" data-gal="prettyPhoto[gal]"
                                   href="{{asset('storage/'.$gallery->thumbnail)}}"
                                   title=""></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>


        <section class="cs section_padding_20" style="background-color: #262d40">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="row col-md-8">
                        <h2 style="margin-bottom: 10px">{{__('general.subscribe')}}</h2>
                        <h6 style="margin: 0 !important;">{{__('general.subscribe-desc')}}</h6>
                        <div class="col-md-9 col-sm-12" style="padding-right: 10px">
                            <input type="text" class="form-subscribe">
                        </div>
                        <input type="submit" class="col-md-3 col-sm-12"
                               style="border-radius:0; background-color: #67d6dd; color:#262d40 "
                               value="{{__('general.subscribe-btn')}}">
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </section>

        <footer class="page_footer ds section_padding_top_50 columns_padding_50"
                style="background-color: #161c29 !important;">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-12 text-center">
                        <div class="widget">

                            <img alt="" src="{{asset("user/images/logo.png")}}" style="width: 150px">
                            <p>
                                {{Helper::getHome()->about_us}}
                            </p>
                            <div class="line-height-thin">
                                <div class="media small-teaser inline-block margin_0">
                                    <div class="media-left media-middle">
                                        <i aria-hidden="true" class="fa fa-map-marker highlight2"></i>
                                    </div>
                                    <div class="media-body media-middle grey">
                                        {{Helper::getHome()->full_address}}
                                    </div>
                                </div>
                                <br>
                                <div class="media small-teaser inline-block margin_0">
                                    <div class="media-left media-middle">
                                        <i aria-hidden="true" class="fa fa-phone highlight2"></i>
                                    </div>
                                    <div class="media-body media-middle grey">
                                        {{Helper::getHome()->phone}}
                                    </div>
                                </div>
                                <br>
                                <div class="media small-teaser inline-block margin_0">
                                    <div class="media-left media-middle">
                                        <i aria-hidden="true" class="fa fa-envelope highlight2"></i>
                                    </div>
                                    <div class="media-body media-middle highlightlinks">
                                        <a href="#">{{Helper::getHome()->email}}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="darklinks topmargin_20">
                                <a class="social-icon border-icon rounded-icon soc-facebook"
                                   href="{{Helper::getHome()->facebook}}"></a>
                                <a class="social-icon border-icon rounded-icon soc-twitter"
                                   href="{{Helper::getHome()->twitter}}"></a>
                                <a class="social-icon border-icon rounded-icon soc-instagram"
                                   href="{{Helper::getHome()->instagram}}"></a>
                                <a class="social-icon border-icon rounded-icon soc-whatsapp"
                                   href="{{Helper::getHome()->whatsapp}}"></a>
                                {{--                            <a class="social-icon border-icon rounded-icon soc-google"--}}
                                {{--                               href="{{Helper::getHome()->facebook}}"></a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 text-center">
                        <div class="widget widget_contact topmargin_10">
                            <h3 style="margin-bottom: 0">Contact Form</h3>
                            <form action="{{route('contact')}}" class="contact-form topmargin_20" method="post">
                                @csrf
                                <p class="contact-form-name">
                                    <label for="footer-name">Name <span class="required">*</span></label>
                                    <input class="form-control text-center" name="name" placeholder="Full Name"
                                           size="30"
                                           style="height: 34px"
                                           type="text" value="" required>
                                </p>
                                <p class="contact-form-email">
                                    <label for="footer-email">Email <span class="required">*</span></label>
                                    <input class="form-control text-center"
                                           name="email" placeholder="Email Address"
                                           size="30" type="email"
                                           style="height: 34px"
                                           value="" required>
                                </p>
                                <p class="contact-form-message">
                                    <label for="footer-message">Message</label>
                                    <textarea aria-required="true" class="form-control text-center" cols="30"
                                              name="content"
                                              style="min-height: 150px !important;"
                                              placeholder="Message" rows="3" required></textarea>
                                </p>
                                <p class="footer_contact-form-submit topmargin_30">
                                    <button class="theme_button color1 wide_button" type="submit">
                                        Send Message
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 text-center">

                        <div class="widget widget_recent_entries topmargin_10">

                            <h3 class="widget-title">{{__('general.footer-visit')}}</h3>
                            <ul class="greylinks">

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>
</x-user-layout>
