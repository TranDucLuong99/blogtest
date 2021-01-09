<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar ps ps--active-y">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">              
                <li class="app-sidebar__heading">{{ config('shopify-app.app_name') }}</li>
                <li>
                    <a href="{{ route('home') }}" @if(Request::is('/')) class="mm-active" @endif>
                        <i class="metismenu-icon fa fa-map-marker-alt"></i>
                        Manage Reviews
                    </a>
                </li>
                <li>
                    <a href="{{route('category.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Category
                    </a>
                </li>
                <li>
                    <a href="{{route('product.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Product
                    </a>
                </li>
                <li>
                    <a href="{{route('blogtest.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Blog
                    </a>
                </li>
                <li>
                    <a href="{{route('sliders.index')}}">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Slider
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-cog"></i>
                        Settings
                    </a>
                </li>

                <li>
                    <a href="{{ route('userguide') }}" @if(Request::is('userguide')) class="mm-active" @endif>
                        <i class="metismenu-icon fa fa-book"></i>
                        User Guide
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" id="showZendeskWidget">
                        <i class="metismenu-icon fa fa-question-circle"></i>
                        Get Support
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="upgrade-modal">
                        <i class="metismenu-icon fa fa-thumbs-up"></i>
                        Upgrade <b style="color: red;">(3-day free trial)</b>
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</div>