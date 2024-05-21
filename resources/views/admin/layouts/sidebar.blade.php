    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('admin/images/logo-dark.png') }}" alt="" height="22">
                </span>
            </a>
            <a href="index" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ URL::asset('admin/images/logo-sm.png') }}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ URL::asset('admin/images/logo-light.png') }}" alt="" height="22">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="menu-title"><span>@lang('translation.menu')</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="{{url('admin/dashboard')}}">
                            <i class="ph-gauge"></i> <span>@lang('translation.dashboards')</span>
                        </a>
                        <!-- <div class="collapse menu-dropdown" id="sidebarDashboards">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="dashboard-analytics" class="nav-link" data-key="t-analytics">
                                        @lang('translation.analytics') </a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard-crm" class="nav-link" data-key="t-crm"> @lang('translation.crm')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="index" class="nav-link" data-key="t-ecommerce"> @lang('translation.ecommerce')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard-learning" class="nav-link" data-key="t-learning">
                                        @lang('translation.learning')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="dashboard-real-estate" class="nav-link" data-key="t-real-estate">
                                        @lang('translation.real-estate') </a>
                                </li>
                            </ul>
                        </div> -->
                    </li>

                    <li class="nav-item">
                        <!-- <a href="{{url('admin/circles')}}" class="nav-link menu-link"> <i class="ph-circle"></i> <span data-key="t-calendar">@lang('translation.circles')</span> </a> -->
                        <a href="{{url('admin/circles')}}" class="nav-link menu-link"> <i class="ph-circle"></i> <span data-key="t-circles">Circles</span> </a>
                    </li>

                    <li class="nav-item">
                        <!-- <a href="{{url('admin/circles')}}" class="nav-link menu-link"> <i class="ph-circle"></i> <span data-key="t-calendar">@lang('translation.circles')</span> </a> -->
                        <a href="{{url('admin/winners')}}" class="nav-link menu-link"> <i class="ri-medal-fill"></i> <span data-key="t-winners">Winners</span> </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                            <i class="ri-user-fill"></i><span data-key="t-users">Users</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarMultilevel">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="{{url('admin/user')}}" class="nav-link">User Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('admin/deletedUser')}}" class="nav-link">Deleted User Listing</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="{{url('admin/user')}}" class="nav-link menu-link"> <i class="ri-user-fill"></i> <span data-key="t-users">Users</span> </a>
                    </li> -->

                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>