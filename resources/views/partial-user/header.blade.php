<header class="page_header header_white toggler_xs_right section_padding_20">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 display_table">
                <div class="header_left_logo display_table_cell">
                    <a class="logo top_logo" href="{{route('index',request()->segment(1))}}">
                        <img alt="" src="{{asset('user/images/logo.png')}}">
                        <span class="logo_text">
                            <span class="big">Imaji</span>
                            <span class="small-text">Sociopreneur</span>
                        </span>
                    </a>
                </div>

                <div class="header_mainmenu display_table_cell text-center">
                    <nav class="mainmenu_wrapper">
                        <ul class="mainmenu nav sf-menu">
                            <li class="{{ Request::route()->getName() == 'index' ? ' active' : '' }}">
                                <a href="{{route('index',request()->segment(1))}}#">{{__('general.home')}}</a>
                            <li class="{{ Request::route()->getName() == 'feature.show' ? ' active' : '' }}">
                                <a>{{__('general.feature')}}</a>
                                <ul>
                                    <li>
                                        <a href="{{route('imaji-academy',request()->segment(1))}}">Imaji Academy</a>
                                    </li>
                                    <li>
                                        <a href="{{route('pkps',request()->segment(1))}}">PKPS Kabupaten Jember</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="{{ Request::route()->getName() == 'event.index' ? ' active' : '' }}{{ Request::route()->getName() == 'event.show' ? ' active' : '' }}">
                                <a href="{{route('event.index',request()->segment(1))}}#">{{__('general.event')}}</a>
                            </li>
                            <li class="{{ Request::route()->getName() == 'tentang.index' ? ' active' : '' }}">
                                <a href="{{route('imaji-sociopreneur',request()->segment(1))}}#">{{__('general.about-us')}}</a>
                            </li>
                            <li class="{{ Request::route()->getName() == 'project.index' ? ' active' : '' }}{{ Request::route()->getName() == 'project.show' ? ' active' : '' }}">
                                <a href="{{route('project.index',request()->segment(1))}}#">{{__('general.project')}}</a>
                            </li>
                            <li>
                                <a>{{__('general.etc')}}</a>
                                <ul>

                                    <li class="{{ Request::route()->getName() == 'faq' ? ' active' : '' }}{{ Request::route()->getName() == 'faq.show' ? ' active' : '' }}">
                                        <a href="{{route('faq',request()->segment(1))}}#">{{__('general.faq')}}</a>
                                    </li>

                                    <li class="{{ Request::route()->getName() == 'blog.index' ? ' active' : '' }}{{ Request::route()->getName() == 'blog.show' ? ' active' : '' }}">
                                        <a href="{{route('blog.index',request()->segment(1))}}#">{{__('general.blog')}}</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="border border-dark">
                                <a>{{request()->segment(1)}} <img
                                        src="{{asset('assets/'.request()->segment(1).'.svg')}}" alt=""
                                        style="width: 20px"> </a>
                                <ul>
                                    <li>
                                        <a class="text-white" href="{{route('index','id') }}"><img
                                                src="{{asset('assets/id.svg')}}" alt="" style="width: 20px"> Indonesia
                                        </a>
                                    </li>
                                    <li>
                                        <a class="text-white" href="{{route('index','en') }}"><img
                                                src="{{asset('assets/en.svg')}}" alt="" style="width: 20px"> English
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('login')}}"
                                   class="button-custom  border-icon rounded-icon in-desktop"
                                   style="padding: 4px 30px !important;">{{__('general.login')}}</a>
                            </li>
                            <!-- eof contacts -->
                        </ul>
                    </nav>
                    <span class="toggle_menu">
                                        <span></span>
                                    </span>


                </div>
                <div class="header_right_buttons display_table_cell text-right hidden-xs">
                    <div class="darklinks">
                        <a class="social-icon border-icon rounded-icon soc-facebook"
                           href="{{Helper::getHome()->facebook}}"></a>
                        <a class="social-icon border-icon rounded-icon soc-twitter"
                           href="{{Helper::getHome()->twitter}}"></a>
                        <a class="social-icon border-icon rounded-icon soc-instagram"
                           href="{{Helper::getHome()->instagram}}"></a>
                        <a class="social-icon border-icon rounded-icon soc-whatsapp"
                           href="{{Helper::getHome()->whatsapp}}"></a>
                        <a href="{{route('login')}}" class="button-custom  border-icon rounded-icon"
                           style="padding: 4px 30px !important;">{{__('general.login')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
