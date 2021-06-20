<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fire"></i><span>Dashboard</span>
                </a>
            </li>
            @if(auth()->user()->role==1 or auth()->user()->role==2 or auth()->user()->role==3)
                <li class="menu-header">Management</li>
                @if(auth()->user()->role==1)
                    <li class="{{ Request::routeIs('admin.budget.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.budget.index') }}">
                            <i class="fas fa-money-bill"></i><span>Budget</span>
                        </a>
                    </li>
                @endif
                <li class="{{ Request::routeIs('admin.rab.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.rab.index') }}">
                        <i class="fas fa-file"></i><span>RAB</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.spj.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.spj.index') }}">
                        <i class="fas fa-file"></i><span>SPJ</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.report.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.report.index') }}">
                        <i class="fas fa-file"></i><span>Report</span>
                    </a>
                </li>
            @endif


            <li class="menu-header">Blogging</li>
            <li class="{{ Request::routeIs('admin.content.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.content.index') }}">
                    <i class="fas fa-blog"></i><span>Content</span>
                </a>
            </li>
            @if(auth()->user()->role==1 or auth()->user()->role==2 or auth()->user()->role==3)
                <li class="{{ Request::routeIs('admin.tag.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.tag.index') }}">
                        <i class="fas fa-tags"></i><span>Tag</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.sosmed.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.sosmed.index') }}">
                        <i class="fas fa-camera"></i><span>Sosmed</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.campaign.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.campaign.index') }}">
                        <i class="fas fa-bullhorn"></i><span>Acv dan Slider</span>
                    </a>
                </li>
                <li class="{{ Request::routeIs('admin.gallery.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.gallery.index') }}">
                        <i class="fas fa-images"></i><span>Gallery</span>
                    </a>
                </li>
                @if(auth()->user()->role==1 or auth()->user()->role==2)
                    <li class="{{ Request::routeIs('admin.faq.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.faq.index') }}">
                            <i class="fas fa-question"></i><span>FAQ</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin.partner.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.partner.index') }}">
                            <i class="fas fa-handshake"></i><span>Partner</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin.team.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.team.index') }}">
                            <i class="fas fa-user"></i><span>Team</span>
                        </a>
                    </li>
                    <li class="{{ Request::routeIs('admin.testimonial.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('admin.testimonial.index') }}">
                            <i class="fas fa-quote-left"></i><span>Testimonial</span>
                        </a>
                    </li>
                @endif

            @endif

            @if(auth()->user()->role==1 or auth()->user()->role==2)
                <li class="menu-header">User</li>
                <li class="{{ Request::routeIs('admin.user.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <i class="fas fa-users"></i><span>User</span>
                    </a>
                </li>
            @endif

        </ul>

    </aside>
</div>
