<x-user-layout>
    <div>

        <img src="{{asset('image/banner/faq.jpg')}}" alt="">

        <section class="ls section_padding_100 columns_padding_25">
            <div class="container">
                <div class="row vertical-tabs">
                    <div class="col-sm-5">

                        <!-- Nav tabs -->
                        <ul class="nav" role="tablist">
                            @php($i=1)
                            @foreach($faqs as $faq)
                                <li class="{{$i==1?'active':''}}">
                                    <a href="faq2.html#vertical-tab{{$i}}" role="tab"
                                       data-toggle="tab">{{ $faq->{'title_'.request()->segment(1)} }}</a>
                                </li>
                                @php($i++)
                            @endforeach
                        </ul>

                    </div>

                    <div class="col-sm-7">
                        <div class="tab-content no-border">
                            @php($i=1)
                            @foreach($faqs as $faq)
                                <div class="tab-pane fade {{$i==1?'in active':''}}" id="vertical-tab{{$i}}">
                                    <h3 class="poppins">{{ $faq->{'title_'.request()->segment(1)} }}</h3>
                                    {!! $faq->{'content_'.request()->segment(1)} !!}
                                </div>
                                @php($i++)
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-user-layout>
