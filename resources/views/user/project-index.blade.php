<x-user-layout>
    <div>
    <section class="ls section_padding_top_100 section_padding_bottom_150 back1" id="about">
        <div class="container mx-auto" style="padding-top:10px;padding-bottom:10px;margin-top:0;margin-bottom:0">
            <img src="{{asset('user/images/banner/project.png')}}" alt="" styles="width:100%">
        </div>
    </section>
    <section class="ls page_portfolio section_padding_top_100 section_padding_bottom_75">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20">
                        @foreach($projects as $project)
                            <div class="isotope-item col-lg-4 col-md-6 col-sm-12">
                                <article
                                    class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                    <div class="item-media">
                                        <img alt="" src="{{asset('storage/'.$project->thumbnail)}}">
                                    </div>
                                    <div class="item-content">
                                        <p class="text-center item-meta">
                                            <span class="entry-date highlightlinks">
                                            <a href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}])}}">
                                                    <time class="entry-date">
                                                        {{$project->created_at->format('d, M Y')}}
                                                    </time>
                                                </a>
                                            </span>
                                        </p>
                                        <h4 class="entry-title">
                                            <a href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}])}}">
                                                {{$project->{'title_'.request()->segment(1)} }}
                                            </a>
                                        </h4>
                                        <a href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}]) }}" class="read-more"></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <img src="img/loading.png" alt="" class="fa-spin"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</x-user-layout>
