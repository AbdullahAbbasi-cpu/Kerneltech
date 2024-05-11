<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                    class="ficon feather icon-menu"></i></a></li>
                    </ul>

                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none"><span
                                    class="user-name text-bold-600 mb-0 text-syne">{!! auth()->user()->first_name . ' ' . auth()->user()->last_name !!}</span></div>
                            <span>
                                @if (auth()->user()->image != '' && file_exists(uploadsDir('admin') . auth()->user()->image))
                                    <img class="round" src="{!! asset(uploadsDir('admin') . auth()->user()->image) !!}" alt="avatar" height="40"
                                        width="40">
                            </span>
                        @else
                            <img class="round" src="{!! asset('assets/admin/app-assets/images/portrait/small/avatar-s-11.jpg') !!}" alt="avatar" height="40"
                                width="40"></span>
                            @endif
                        </a>
                        <div class="text-syne dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                href="{!! route('admin.update-profile') !!}"><i class="feather icon-user"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="javascript:;"
                                onclick="logout()"><i class="feather icon-power"></i> Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->


<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="javascript:void(0);">
                    {{-- <div class="brand-logo"></div> --}}
                    <h2 class="brand-text mb-0 text-syne">{{ config('app.name', 'Laravel') }}</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                        class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i
                        class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                        data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom d-none"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main text-syne" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ request()->segment(2) == 'dashboard' ? 'active' : '' }}">
                <a href="{{ url('/admin') }}">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="Dashboard">
                        Dashboard
                    </span>
                </a>
            </li>

            <li class=" navigation-header section-headers"><span>Modules</span>
            </li>

            <!-- Administrator  -->

            <li class="nav-item {{ request()->segment(2) == 'administrators' ? 'active' : '' }}"> <a href="#"><i
                        class="feather icon-user"></i><span class="menu-title"
                        data-i18n="User">Administrators</span></a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'administrators' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.administrators.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add New</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'administrators' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.administrators.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">List</span></a>
                    </li>
                </ul>
            </li>

            <!-- Achievement -->

            {{-- <li class="nav-item {{ request()->segment(2) == 'achievements' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-sliders"></i><span class="menu-title">Achievements</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'achievements' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.achievements.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Achievement</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'achievements' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.achievements.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Achievement</span></a>
                    </li>
                </ul>
            </li> --}}

            <!-- Media Files -->

            {{-- <li class="nav-item {{ request()->segment(2) == 'media-files' ? 'active' : '' }}"><a href="#"><i class="feather icon-film"></i><span class="menu-title" data-i18n="Media player">Media Files</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'media-files' && request()->segment(3) == 'create') ? 'active' : '' }}"><a href="{{ route('admin.media-files.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Add New</span></a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'media-files' && request()->segment(3) != 'create') ? 'active' : '' }}"><a href="{{ route('admin.media-files.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">List</span></a>
                    </li>
                </ul>
            </li> --}}


            <!-- Banners -->

            {{-- <li class="nav-item {{ request()->segment(2) == 'banners' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-airplay"></i><span class="menu-title">Banners</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'banners' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Banner</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'banners' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.banners.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Banners</span></a>
                    </li>
                </ul>
            </li> --}}


            <!-- Pages -->
            {{-- <li class="nav-item {{ request()->segment(2) == 'pages' ? 'active' : '' }}">
                <a href="#">
                    <i class="feather icon-book-open"></i>
                    <span class="menu-title">Pages</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'pages' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.create') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">Add Page</span>
                        </a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'pages' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Manage Pages</span>
                        </a>
                    </li>
                </ul>
            </li> --}}

            <li class="nav-item {{ request()->segment(2) == 'pages' ? 'active' : '' }}">
                <a href="#">
                    <i class="feather icon-book-open"></i>
                    <span class="menu-title">Pages</span>
                </a>
                <ul class="menu-content">
                    {{-- <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) == 'create') ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.create') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="List">Add Page</span>
                        </a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) != 'create') ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Manage Pages</span>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item {{ request()->segment(2) == 'home' ? 'active' : '' }}">
                        <a href="{{ route('admin.site-settings.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Home</span>
                        </a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) != 'create') ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">About</span>
                        </a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) != 'create') ? 'active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->segment(2) == 'privacy-policy' ? 'active' : '' }}">
                        <a href="{{ route('admin.privacy-policy.index') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Privacy Policy</span>
                        </a>
                    </li> --}}
                    <li class="nav-item {{ request()->segment(2) == 'content-pages' && request()->segment(3) == 'terms' ? 'active' : '' }}">
                        <a href="{{ route('admin.content-pages.terms') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Terms and Conditions</span>
                        </a>
                    </li>
                    
                    <li class="nav-item {{ request()->segment(2) == 'content-pages' && request()->segment(3) == 'privacy' ? 'active' : '' }}">
                        <a href="{{ route('admin.content-pages.privacy') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">Privacy Policy</span>
                        </a>
                    </li>

                    <li class="nav-item {{ request()->segment(2) == 'content-pages' && request()->segment(3) == 'about' ? 'active' : '' }}">
                        <a href="{{ route('admin.content-pages.about') }}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item" data-i18n="View">About Page</span>
                        </a>
                    </li>


                </ul>
            </li>

            <!-- Testimonials -->

            <li class="nav-item {{ request()->segment(2) == 'testimonials' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-message-circle"></i><span class="menu-title">Testimonials</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'testimonials' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.testimonials.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Testimonial</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'testimonials' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.testimonials.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Testimonials</span></a>
                    </li>
                </ul>
            </li>

            <!-- Working Process -->
            {{--<li class="nav-item {{ request()->segment(2) == 'working-process' ? 'active' : '' }}"><a
                    href="#"><i class="feather icon-edit"></i><span class="menu-title">Working Process</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'working-process' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.working-process.create') }}"><i
                                class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Add Working
                                Process</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'working-process' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.working-process.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View" title="Manage Working Process">Manage Working
                                Process</span></a>
                    </li>
                </ul>
            </li> --}}

            <!-- Industry -->
            {{-- <li class="nav-item {{ request()->segment(2) == 'industries' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-sliders"></i><span class="menu-title">Industries</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'industries' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.industries.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Industry</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'industries' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.industries.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Industry</span></a>
                    </li>
                </ul>
            </li> --}}


            <!-- Technology -->
            {{-- <li class="nav-item {{ request()->segment(2) == 'technologies' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-move"></i><span class="menu-title">Technologies</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'technologies' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.technologies.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Technology</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'technologies' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.technologies.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Technology</span></a>
                    </li>
                </ul>
            </li> --}}

            
            <!-- Blog -->
            <li class="nav-item {{ request()->segment(2) == 'blog' ? 'active' : '' }}"><a href="#"><i
                        class="feather icon-move"></i><span class="menu-title">Blogs</span>
                </a>
                <ul class="menu-content">
                    <li
                        class="{{ request()->segment(2) == 'blog' && request()->segment(3) == 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.create') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="List">Add Blog</span></a>
                    </li>
                    <li
                        class="{{ request()->segment(2) == 'blog' && request()->segment(3) != 'create' ? 'active' : '' }}">
                        <a href="{{ route('admin.blogs.index') }}"><i class="feather icon-circle"></i><span
                                class="menu-item" data-i18n="View">Manage Blog</span></a>
                    </li>
                </ul>
            </li>


            <!-- Contact -->

            <li class="nav-item {{ request()->segment(2) == 'contact' ? 'active' : '' }}">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="feather icon-phone"></i>
                    <span class="menu-title" data-i18n="Email">Contacts</span>
                </a>
            </li>

            <!-- Inquiry -->

            <li class="nav-item {{ request()->segment(2) == 'inquiry' ? 'active' : '' }}">
                <a href="{{ route('admin.inquiry.index') }}">
                    <i class="feather icon-search"></i>
                    <span class="menu-title" data-i18n="Email">Inquiries</span>
                </a>
            </li>

            <!-- Subscribe -->

            <li class="nav-item {{ request()->segment(2) == 'subscribe' ? 'active' : '' }}">
                <a href="{{ route('admin.subscribe.index') }}">
                    <i class="feather icon-bell"></i>
                    <span class="menu-title" data-i18n="Email">Subscribes</span>
                </a>
            </li>

            <!-- Free quote -->
            <li class="nav-item {{ request()->segment(2) == 'free-quote' ? 'active' : '' }}">
                <a href="{{ route('admin.free-quote.index') }}">
                    <i class="feather icon-file"></i>
                    <span class="menu-title" data-i18n="Email">Free Quote</span>
                </a>
            </li>


            <!-- Pages -->

            {{-- <li class="nav-item {{ request()->segment(2) == 'pages' ? 'active' : '' }}"><a href="#"><i class="feather icon-globe"></i><span class="menu-title" data-i18n="l18n">Pages</span>
                </a>
                <ul class="menu-content">
                    <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) == 'create') ? 'active' : '' }}"><a href="{{ route('admin.pages.create') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="List">Add New</span></a>
                    </li>
                    <li class="{{ (request()->segment(2) == 'pages' && request()->segment(3) != 'create') ? 'active' : '' }}"><a href="{{ route('admin.pages.index') }}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="View">List</span></a>
                    </li>
                </ul>
            </li> --}}


            <li class="navigation-header section-headers"><span>Settings</span>
            </li>
            <li class="nav-item {{ request()->segment(2) == 'site-settings' ? 'active' : '' }}">
                <a href="{{ route('admin.site-settings.index') }}">
                    <i class="feather icon-settings"></i>
                    <span class="menu-title" data-i18n="Email">Site Settings</span>
                </a>
            </li>
        </ul>
    </div>
</div>
