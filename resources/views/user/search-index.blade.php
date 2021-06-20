<x-user-layout>
    <div>
        <section class="ls page_portfolio section_padding_top_50 section_padding_bottom_75">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        @if(count($projects)!=0)
                            <h2>Project</h2>
                            <div class="isotope_container isotope row masonry-layout ">
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
                                                        {{$project->created_at->format('M d Y')}}
                                                    </time>
                                                </a>
                                            </span>
                                                </p>
                                                <h4 class="entry-title">
                                                    <a href="{{route('content.show',[request()->segment(1),$project->{'slug_'.request()->segment(1)}])}}">
                                                        {{$project->{'title_'.request()->segment(1)} }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(count($events)!=0)
                            <h2>Event</h2>
                            <div class=" isotope row masonry-layout ">
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
                                                        {{$event->date}}
                                                    </time>
                                                </a>
                                            </span>
                                                </p>
                                                <h4 class="entry-title">
                                                    <a href="{{route('content.show',[request()->segment(1),$event->{'slug_'.request()->segment(1)}])}}">
                                                        {{ $event->{'title_'.request()->segment(1)} }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        @if(count($blogs)!=0)
                            <h2>Blog</h2>
                            <div class="isotope_container isotope row masonry-layout ">
                                @foreach($blogs as $blog)
                                    <div class="isotope-item col-lg-4 col-md-6 col-sm-12">
                                        <article
                                            class="vertical-item content-padding with_background text-center rounded overflow-hidden">
                                            <div class="item-media">
                                                <img alt="" src="{{asset('storage/'.$blog->thumbnail)}}">
                                            </div>
                                            <div class="item-content">
                                                <p class="text-center item-meta">
                                            <span class="entry-date highlightlinks">
                                            <a href="{{route('content.show',[request()->segment(1),$blog->{'slug_'.request()->segment(1)}])}}">
                                                    <time class="entry-date">
                                                        {{$blog->created_at->format('M d Y')}}
                                                    </time>
                                                </a>
                                            </span>
                                                </p>
                                                <h4 class="entry-title">
                                                    <a href="{{route('content.show',[request()->segment(1),$blog->{'slug_'.request()->segment(1)}])}}">
                                                        {{ $blog->{'title_'.request()->segment(1)} }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-user-layout>
