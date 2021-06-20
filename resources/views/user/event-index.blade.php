<x-user-layout>
<div>
    <section class="ls section_padding_top_100 section_padding_bottom_150 back1" id="about">
        <div class="container mx-auto" style="padding-top:10px;padding-bottom:10px;margin-top:0;margin-bottom:0">
            <img src="{{asset('user/images/banner/event.png')}}" alt="" styles="width:100%">
        </div>
    </section>

    <section class="ls page_portfolio section_padding_top_100 section_padding_bottom_75">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
                        @foreach($events as $event)
                            <div class="isotope-item col-lg-4 col-md-6 col-sm-12">
                                <article
                                    class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                    <div class="item-media">
                                        <img alt="" src="{{asset('storage/'.$event->thumbnail)}}">
                                    </div>
                                    <div class="item-content">
                                        <p class="text-center item-meta">
                                            <span class="entry-date highlightlinks">
                                            <a href="{{route('content.show',[request()->segment(1),$event->{'slug_'.request()->segment(1)}])}}">
                                                    <time class="entry-date">
                                                        {{$event->date_event }}
                                                    </time>
                                                </a>
                                            </span>
                                        </p>
                                        <h4 class="entry-title">
                                            <a href="{{route('content.show',[request()->segment(1),$event->{'slug_'.request()->segment(1)}])}}">
                                                {{$event->{'title_'.request()->segment(1)} }}
                                            </a>
                                        </h4>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</x-user-layout>
