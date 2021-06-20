<x-user-layout>
    <div>
        <x-slot name="scripts">
            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '562255711375475', status: true, cookie: true, xfbml: true
                    });
                };
                (function (d, debug) {
                    var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement('script');
                    js.id = id;
                    js.async = true;
                    js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
                    ref.parentNode.insertBefore(js, ref);
                }(document, /*debug*/ false));

                function postToFeed(title, desc, url, image) {
                    var obj = {
                        method: 'feed',
                        link: url,
                        picture: 'http://www.url.com/images/' + image,
                        name: title,
                        description: desc
                    };

                    function callback(response) {
                    }

                    FB.ui(obj, callback);
                }
            </script>
            <script>
                $('.btnShare').click(function () {
                    elem = $(this);
                    postToFeed(elem.data('title'), elem.data('desc'), elem.prop('href'), elem.data('image'));

                    return false;
                });
            </script>
        </x-slot>

        <x-slot name="title">
            {{ $content->{'title_'.request()->segment(1)} }}
        </x-slot>

        <x-slot name="meta">
            <meta property="og:url"
                  content="{{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}">
            <meta property="og:type" content="website">
            <meta property="og:title" content="{{ $content->{'title_'.request()->segment(1)} }}">
            <meta property="og:description" content="{{ $content->{'title_'.request()->segment(1)} }}">
            <meta property="og:image" content="{{asset('storage/'.$content->thumbnail)}}">
        </x-slot>


        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                let js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <section class="ls section_padding_top_50 section_padding_bottom_100 columns_padding_25">
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-push-1">
                        <article
                            class="single-post vertical-item content-padding big-padding post with_background rounded">
                            <div class="entry-thumbnail item-media">
                                {{--                            <img alt="" src="{{URL::to('/')}}/image/blog/{{$content->image}}">--}}
                                <img alt="" src="{{asset('storage/'.$content->thumbnail)}}">
                            </div>
                           
                            <div class="item-content">
                            <h1 style="font-size: 2em;">{{ $content->{'title_'.request()->segment(1)} }}</h1>
                                <header class="entry-header">
                                    <div class="row">
                                        <div style="background: #1877f2" class="btn btn-sm rounded">
                                            <div class="fb-share-button"
                                                 data-href="{{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}"
                                                 data-size="small"
                                                 data-layout="button_count">
                                            </div>
                                        </div>

                                        <a style="padding: 6px 20px" class="btn btn-success btn-sm rounded"
                                           href="whatsapp://send?text={{$content->{'title_'.request()->segment(1)} }} %0a %0a  {{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}"
                                           data-action="share/whatsapp/share"> <i
                                                style="margin-right: 5px;color: white" class="fa fa-whatsapp"
                                                aria-hidden="true"></i>Share</a>
                                    </div>

                                    <p class="content-justify item-meta">
								<span class="entry-date highlightlinks">
									<a rel="bookmark">
										<time class="entry-date" datetime="2017-03-13T08:50:40+00:00">
											{{$content->created_at->format('d, M Y')}}
										</time>
									</a>
								</span>
                                    </p>
                                    <h1 class="entry-title topmargin_0">
                                        {{$content->{'content'.request()->segment(1)} }}
                                    </h1>
                                </header>
                                <div class="entry-content">
                                    {{--                                {{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}--}}
                                    {!! $content->{'content_'.request()->segment(1)} !!}
                                </div>
                            </div>
                        </article>
                        <div class="author-meta side-item content-padding with_background rounded">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="item-media">
                                        {{--                                    <img alt="" src="{{URL::to('/')}}/image/user/{{$content->user->avatar}}">--}}

                                        <img alt="" src="{{asset('storage/'.$content->user->profile_photo_path)}}">

                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="item-content">
                                        <h5 class="text-uppercase poppins">{{$content->user->name}}</h5>
                                        <p class="small-text highlight2 bottommargin_10">{{$content->user->position}}</p>

                                        <p>{{$content->user->quotes}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--                    <div class="with_padding big-padding with_background rounded comments-wrapper">--}}
                        {{--                        <div class="comments-area" id="comments">--}}
                        {{--                            <ol class="comment-list">--}}
                        {{--                                @foreach($content->blogComments as $comment)--}}
                        {{--                                        <div class="media-left">--}}
                        {{--                                            <article class="comment-body media">--}}
                        {{--                                                @if($comment->user_id!=null)--}}
                        {{--                                            <img class="media-object" alt="" src="{{asset('storage/'.$comment->user->profile_photo_path)}}">--}}
                        {{--                                            @endif--}}
                        {{--                                        </div>--}}
                        {{--                                        <div class="media-body">--}}
                        {{--                                            <div class="comment-meta darklinks">--}}
                        {{--                                                <a class="author_url" rel="external nofollow"--}}
                        {{--                                                   href="content-single-full.html#">--}}
                        {{--                                                    {{$comment->name=="" ? $comment->user->name :$comment->name}}--}}
                        {{--                                                </a>--}}
                        {{--                                                <span class="comment-date highlight">--}}
                        {{--                                                        <time class="entry-date">--}}
                        {{--                                                            {{$comment->created_at->diffForHumans()}}--}}
                        {{--                                                        </time>--}}
                        {{--                                                    </span>--}}
                        {{--                                            </div>--}}
                        {{--                                            <p>--}}
                        {{--                                                {{$comment->comment}}--}}
                        {{--                                            </p>--}}
                        {{--                                        </div>--}}
                        {{--                                    </article>--}}
                        {{--                                    <li class="comment even thread-even depth-1 parent" style="background-color: white">--}}
                        {{--                                    </li>--}}
                        {{--                                @endforeach--}}
                        {{--                            </ol>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="comment-respond" id="respond">--}}
                        {{--                            <h4 class="poppins">Tinggalkan komentar</h4>--}}
                        {{--                            <form class="comment-form columns_padding_10" id="commentform" method="post"--}}
                        {{--                                  action="{{route('blog.comment',$content->slug)}}">--}}
                        {{--                                @csrf--}}
                        {{--                                <input type="hidden" name="blog_id" value="{{$content->id}}">--}}
                        {{--                                <input type="hidden" name="slug" value="{{$content->slug}}">--}}
                        {{--                                <div class="row">--}}
                        {{--                                    @if(Auth::user()==null)--}}
                        {{--                                        <div class="col-md-4">--}}
                        {{--                                            <div class="form-group margin_0">--}}

                        {{--                                                <input type="text" aria-required="true" size="30" value="" name="name"--}}
                        {{--                                                       id="author" class="form-control" placeholder="Nama Lengkap">--}}
                        {{--                                            </div>--}}
                        {{--                                        </div>--}}
                        {{--                                    @else--}}
                        {{--                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
                        {{--                                    @endif--}}
                        {{--                                    <div class="col-md-12">--}}
                        {{--                                        <div class="form-group margin_0">--}}
                        {{--                                            <label for="comment">Comment</label>--}}
                        {{--                                            <textarea aria-required="true" rows="3" cols="45" name="comment"--}}
                        {{--                                                      id="comment" class="form-control"--}}
                        {{--                                                      placeholder="Komentar" required></textarea>--}}
                        {{--                                        </div>--}}
                        {{--                                    </div>--}}
                        {{--                                </div>--}}
                        {{--                                <div class="form-submit topmargin_30">--}}
                        {{--                                    <button type="submit" id="submit" name="submit"--}}
                        {{--                                            class="theme_button color1 wide_button">Kirim <komentar></komentar>--}}
                        {{--                                    </button>--}}
                        {{--                                </div>--}}
                        {{--                            </form>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}

                        @if($prev!=null)
                            <div class="row columns_padding_5 page-nav">
                                <div class="col-md-6">
                                    <div class="with_padding text-center ds bg_teaser after_cover darkgrey_bg"
                                         style='background-image: url("{{asset('storage/'.$prev->thumbnail)}}");'>
                                        <img alt="" src="{{asset('storage/'.$prev->thumbnail)}}">
                                        <div>
                                            <div class="highlight fontsize_14">
                                                Prev
                                            </div>
                                            <h4 class="poppins">
                                                <a href="{{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}"
                                                   rel="bookmark">
                                                    {{$prev->{'title_'.request()->segment(1)} }}
                                                </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($next!=null)
                                    <div class="col-md-6">
                                        <div class="with_padding text-center ds bg_teaser after_cover darkgrey_bg"
                                             style='background-image: url("{{asset('storage/'.$next->thumbnail)}}");'>
                                            {{--                                        <img alt="" src="{{URL::to('/')}}/image/blog/{{$next->image}}">--}}
                                            <img alt="" src="{{asset('storage/'.$next->thumbnail)}}">
                                            <div class="item-content">
                                                <div class="highlight fontsize_14">
                                                    Next
                                                </div>
                                                <h4 class="poppins">
                                                    <a href="{{route('content.show',[request()->segment(1),$content->{'slug_'.request()->segment(1)}])}}"
                                                       rel="bookmark">
                                                        {{$next->{'title_'.request()->segment(1)} }}
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-user-layout>


