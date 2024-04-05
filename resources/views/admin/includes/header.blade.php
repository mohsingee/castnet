<style>
    aside.main-sidebar::-webkit-scrollbar {
        width: 0;  /* Remove scrollbar space */
        background: transparent;  /* Optional: make scrollbar invisible */
    }

    aside.main-sidebar {
        scrollbar-width: none;  /* Firefox */
    }
</style>
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="btn btn-sm btn-info mt-1" href="{{ route('account.setting') }}">Account Setting</a>
                <a class="btn btn-sm btn-info mt-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="position: fixed;
    height: 100%;
    overflow-y: auto;">
        <!-- Brand Logo -->
        <a href="{{ route('admin.index') }}" class="brand-link">
            <img src="{{ asset('assets/web/images/'.appSetting()->header_logo) }}" alt="{{ appSetting()->title }}" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">{{ appSetting()->title }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- SidebarSearch Form -->

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    {{-- Home Page Start --}}
                    <li class="nav-item {{(request()->routeIs(['homepage.banner','homesection1*','homesection2*','homesection3*','homesection4*','homesection5*','homesection6*','homesection7*','homesection8*','homesection9*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                HOME
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('homepage.banner') }}" class="nav-link {{(request()->routeIs('homepage.banner')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection1.index') }}" class="nav-link {{(request()->routeIs('homesection1*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection2.index') }}" class="nav-link {{(request()->routeIs('homesection2.index')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 2</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection3.index') }}" class="nav-link {{(request()->routeIs('homesection3.index')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 3</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection4.index') }}" class="nav-link {{(request()->routeIs('homesection4*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 4</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection5.index') }}" class="nav-link {{(request()->routeIs('homesection5*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 5</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection6.index') }}" class="nav-link {{(request()->routeIs('homesection6*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 6</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection7.index') }}" class="nav-link {{(request()->routeIs('homesection7*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 7</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection8.index') }}" class="nav-link {{(request()->routeIs('homesection8*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 8</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('homesection9.index') }}" class="nav-link {{(request()->routeIs('homesection9*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 9</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Home Page End --}}

                    {{-- About Us Page Start --}}
                    <li class="nav-item {{ (request()->routeIs(['aboutus*','whoweare*','our-team*','contactus*'])) ? 'menu-is-opening menu-open' : '' }}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> ABOUT US <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('aboutus*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> ABOUT US <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('aboutus.banner') }}" class="nav-link {{(request()->routeIs('aboutus.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('aboutus.section1') }}" class="nav-link {{(request()->routeIs('aboutus.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('aboutus.section2') }}" class="nav-link {{(request()->routeIs('aboutus.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('aboutus.section3') }}" class="nav-link {{(request()->routeIs('aboutus.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('whoweare*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> WHO WE ARE <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('whoweare.banner') }}" class="nav-link {{(request()->routeIs('whoweare.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('whoweare.section1') }}" class="nav-link {{(request()->routeIs('whoweare.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('whoweare.section2') }}" class="nav-link {{(request()->routeIs('whoweare.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('our-team*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> OUR TEAM <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('our-team.banner') }}" class="nav-link {{(request()->routeIs('our-team.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('our-team.index') }}" class="nav-link {{(request()->routeIs(['our-team.index','our-team.edit','our-team.create'])) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Team Members</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('contactus*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CONTACT US <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('contactus.banner') }}" class="nav-link {{(request()->routeIs('contactus.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('contactus.info') }}" class="nav-link {{(request()->routeIs('contactus.info')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Contact Info</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{-- About Us Page End --}}


                    {{--  Membership Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['membership*','join*','benefits*','programs*','evaluation*','roe*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> MEMBERSHIP <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('membership*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> MEMBERSHIP <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('membership.banner') }}" class="nav-link {{(request()->routeIs('membership.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('membership.section1') }}" class="nav-link {{(request()->routeIs('membership.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('membership.index') }}" class="nav-link {{(request()->routeIs('membership.index','membership.create','membership.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('membership.section3') }}" class="nav-link {{(request()->routeIs('membership.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('join*','join-form-setting*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> JOIN <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('join.banner') }}" class="nav-link {{(request()->routeIs('join.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('join.index') }}" class="nav-link {{(request()->routeIs('join.index','join.create','join.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Features</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('join-form-setting.index') }}" class="nav-link {{(request()->routeIs('join-form-setting*')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Form Setting</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('benefits*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> BENEFITS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('benefits.banner') }}" class="nav-link {{(request()->routeIs('benefits.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('benefits.section1') }}" class="nav-link {{(request()->routeIs('benefits.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('benefits.section2') }}" class="nav-link {{(request()->routeIs('benefits.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('programs*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> PROGRAMS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('programs.banner') }}" class="nav-link {{(request()->routeIs('programs.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('programs.index') }}" class="nav-link {{(request()->routeIs('programs.index','programs.create','programs.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Programs</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('evaluation*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> EVALUATION <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('evaluation.banner') }}" class="nav-link {{(request()->routeIs('evaluation.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('evaluation.section') }}" class="nav-link {{(request()->routeIs('evaluation.section')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('evaluation.section3') }}" class="nav-link {{(request()->routeIs('evaluation.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('evaluation.section4') }}" class="nav-link {{(request()->routeIs('evaluation.section4')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 4</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('roe*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> RULES OF ENG.. <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('roe.banner') }}" class="nav-link {{(request()->routeIs('roe.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('roe.section1') }}" class="nav-link {{(request()->routeIs('roe.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('roe.index') }}" class="nav-link {{(request()->routeIs('roe.index','roe.create','roe.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  Membership Page End  --}}

                    {{--  Sectors Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['sectors*','sector-c1cons*','sector-c2cons.section2','sector-c1agr*','sector-c2agr.section2','sector-c1sc*','sector-c2sc.section2','sector-c1tec*','sector-c2tec.section2','sector-c1nat*','sector-c2nat.section2','sector-c1energy*','sector-c2energy.section2','sector-c1text*','sector-c2text.section2'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> SECTORS <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('sectors*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SECTORS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sectors.banner') }}" class="nav-link {{(request()->routeIs('sectors.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sectors.index') }}" class="nav-link {{(request()->routeIs(['sectors.index','sectors.edit','sectors.create'])) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sectors</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1cons*','sector-c2cons.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CONSTRUCTION <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1cons.banner') }}" class="nav-link {{(request()->routeIs('sector-c1cons.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1cons.section1') }}" class="nav-link {{(request()->routeIs('sector-c1cons.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2cons.section2') }}" class="nav-link {{(request()->routeIs('sector-c2cons.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1agr*','sector-c2agr.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> AGRICULTURE <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1agr.banner') }}" class="nav-link {{(request()->routeIs('sector-c1agr.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1agr.section1') }}" class="nav-link {{(request()->routeIs('sector-c1agr.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2agr.section2') }}" class="nav-link {{(request()->routeIs('sector-c2agr.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1sc*','sector-c2sc.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SUPPLY CHAIN <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1sc.banner') }}" class="nav-link {{(request()->routeIs('sector-c1sc.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1sc.section1') }}" class="nav-link {{(request()->routeIs('sector-c1sc.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2sc.section2') }}" class="nav-link {{(request()->routeIs('sector-c2sc.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1tec*','sector-c2tec.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> TECHNOLOGY <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1tec.banner') }}" class="nav-link {{(request()->routeIs('sector-c1tec.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1tec.section1') }}" class="nav-link {{(request()->routeIs('sector-c1tec.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2tec.section2') }}" class="nav-link {{(request()->routeIs('sector-c2tec.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1nat*','sector-c2nat.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> NATURAL RESOURCES <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1nat.banner') }}" class="nav-link {{(request()->routeIs('sector-c1nat.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1nat.section1') }}" class="nav-link {{(request()->routeIs('sector-c1nat.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2nat.section2') }}" class="nav-link {{(request()->routeIs('sector-c2nat.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1energy*','sector-c2energy.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> ENERGY <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1energy.banner') }}" class="nav-link {{(request()->routeIs('sector-c1energy.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1energy.section1') }}" class="nav-link {{(request()->routeIs('sector-c1energy.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2energy.section2') }}" class="nav-link {{(request()->routeIs('sector-c2energy.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs(['sector-c1text*','sector-c2text.section2'])) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> TEXTILES <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1text.banner') }}" class="nav-link {{(request()->routeIs('sector-c1text.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c1text.section1') }}" class="nav-link {{(request()->routeIs('sector-c1text.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('sector-c2text.section2') }}" class="nav-link {{(request()->routeIs('sector-c2text.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  Sectors Page End  --}}


                    {{--  Advocacy Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['advocacy*','small_business*','women*','veterans*','supportser*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> ADVOCACY <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('advocacy*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> ADVOCACY <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('advocacy.banner') }}" class="nav-link {{(request()->routeIs('advocacy.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('advocacy.section1') }}" class="nav-link {{(request()->routeIs('advocacy.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('advocacy.section2') }}" class="nav-link {{(request()->routeIs('advocacy.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('advocacy.section3') }}" class="nav-link {{(request()->routeIs('advocacy.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('small_business*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SMALL BUSINESS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.banner') }}" class="nav-link {{(request()->routeIs('small_business.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.section1') }}" class="nav-link {{ (request()->routeIs('small_business.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.section2') }}" class="nav-link {{ (request()->routeIs('small_business.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.section3') }}" class="nav-link {{ (request()->routeIs('small_business.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.section4') }}" class="nav-link {{ (request()->routeIs('small_business.section4')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 4</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('small_business.section5') }}" class="nav-link {{ (request()->routeIs('small_business.section5')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 5</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('women*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> WOMEN <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('women-banner') }}" class="nav-link {{(request()->routeIs('women-banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                        <a href="{{ route('women.section1') }}" class="nav-link {{(request()->routeIs('women.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('women.section2') }}" class="nav-link {{(request()->routeIs('women.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('women.section3') }}" class="nav-link {{(request()->routeIs('women.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('women.section4') }}" class="nav-link {{(request()->routeIs('women.section4')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 4</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('women.section5') }}" class="nav-link {{(request()->routeIs('women.section5')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 5</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('women.section6') }}" class="nav-link {{(request()->routeIs('women.section6')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 6</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('veterans*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> VETERANS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('veterans.banner') }}" class="nav-link {{(request()->routeIs('veterans.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('veterans.section1') }}" class="nav-link {{(request()->routeIs('veterans.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('veterans.section2') }}" class="nav-link {{(request()->routeIs('veterans.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('veterans.section3') }}" class="nav-link {{(request()->routeIs('veterans.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('supportser*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SUPPORT SERVICES <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('supportser.banner') }}" class="nav-link {{(request()->routeIs('supportser.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('supportser.section1') }}" class="nav-link {{(request()->routeIs('supportser.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('supportser.section2') }}" class="nav-link {{(request()->routeIs('supportser.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('supportser.section3') }}" class="nav-link {{(request()->routeIs('supportser.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  Advocacy Page End  --}}

                    {{--  EVENTS Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['myEvent*','event-calender*','international_events*','event-request*','event-category.update'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> EVENTS <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('myEvent*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> EVENTS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('myEvent.banner') }}" class="nav-link {{(request()->routeIs('myEvent.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('myEvent.section1') }}" class="nav-link {{(request()->routeIs('myEvent.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('myEvent.index') }}" class="nav-link {{(request()->routeIs(['myEvent.index','myEvent.create','myEvent.edit'])) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('myEvent.section3') }}" class="nav-link {{(request()->routeIs('myEvent.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('event-calender*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> EVENT CALENDAR <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('event-calender.banner') }}" class="nav-link {{(request()->routeIs('event-calender.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('event-calender.index') }}" class="nav-link {{(request()->routeIs('event-calender.index','event-calender.create','event-calender.edit','event-calender.udpate')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Events</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('event_request*','event-category.update')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> EVENT REQUEST <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('event_request.banner') }}" class="nav-link {{(request()->routeIs('event_request.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('event_request.index') }}" class="nav-link {{(request()->routeIs('event_request.index')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('international_events*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> INTERNATIONAL EVE.. <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('international_events.banner') }}" class="nav-link {{(request()->routeIs('international_events.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('international_events.index') }}" class="nav-link {{(request()->routeIs(['international_events.index','international_events.create','international_events.edit'])) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Events</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  EVENTS Page End  --}}


                    {{--  BLOG Page Start  --}}
                    <li class="nav-item {{(request()->routeIs('my-blog*')) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                BLOG
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('my-blog.banner') }}" class="nav-link {{(request()->routeIs('my-blog.banner')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('my-blog.index') }}" class="nav-link {{(request()->routeIs(['my-blog.index','my-blog.edit','my-blog.create'])) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Blog</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--  BLOG Page End  --}}


                    {{--  FINANCIAL Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['financial*','grants*','funding*','form.banner','funding.fee'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> FINANCIAL <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('financial*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> FINANCIAL <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('financial.banner') }}" class="nav-link {{(request()->routeIs('financial.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('financial.section1') }}" class="nav-link {{(request()->routeIs('financial.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('financial.section2') }}" class="nav-link {{(request()->routeIs('financial.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('financial.section3') }}" class="nav-link {{(request()->routeIs('financial.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('grants*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> GRANTS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('grants.banner') }}" class="nav-link {{(request()->routeIs('grants.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('grants.section1') }}" class="nav-link {{(request()->routeIs('grants.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('grants.section2') }}" class="nav-link {{(request()->routeIs('grants.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('funding*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> FUNDING <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('funding.banner') }}" class="nav-link {{(request()->routeIs('funding.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('funding.section1') }}" class="nav-link {{(request()->routeIs('funding.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('funding.section2') }}" class="nav-link {{(request()->routeIs('funding.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('forms*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> FORMS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('forms.banner') }}" class="nav-link {{(request()->routeIs('forms.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    {{--  FINANCIAL Page End  --}}


                    {{--  PARTNERS SPONSORS Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['partnersponsor*','becomepartner*','becomesponsor*','partnersponsor.fees'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> PARTNERS SPONSORS <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('partnersponsor*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> PARTNERS SPONSORS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('partnersponsor.banner') }}" class="nav-link {{(request()->routeIs('partnersponsor.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('partnersponsor.index') }}" class="nav-link {{(request()->routeIs('partnersponsor.index')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('partnersponsor.section2') }}" class="nav-link {{(request()->routeIs('partnersponsor.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('becomepartner*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> BECOME A PARTNER <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('becomepartner.banner') }}" class="nav-link {{(request()->routeIs('becomepartner.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomepartner.index') }}" class="nav-link {{(request()->routeIs('becomepartner.index')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomepartner.section2') }}" class="nav-link {{(request()->routeIs('becomepartner.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomepartner.section3') }}" class="nav-link {{(request()->routeIs('becomepartner.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('becomesponsor*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> BECOME A SPONSOR <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('becomesponsor.banner') }}" class="nav-link {{(request()->routeIs('becomesponsor.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomesponsor.section1') }}" class="nav-link {{(request()->routeIs('becomesponsor.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('becomesponsor.section2') }}" class="nav-link {{(request()->routeIs('becomesponsor.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('partnersponsor.fees') }}" class="nav-link {{(request()->routeIs('partnersponsor.fees')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Fees</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{--  PARTNERS SPONSORS Page End  --}}


                    {{--  OUTREACH Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['outreach*','chad*','ghana*','southafrica*','zimbabwe*','cameroon*','drc*','cotedivoire*','usa*','india*','south_america*','uganda*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> OUTREACH <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('outreach*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> OUTREACH <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('outreach.banner') }}" class="nav-link {{(request()->routeIs('outreach.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('outreach.section1') }}" class="nav-link {{(request()->routeIs('outreach.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('outreach.section2') }}" class="nav-link {{(request()->routeIs('outreach.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('outreach.section3') }}" class="nav-link {{(request()->routeIs('outreach.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('chad*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CHAD <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('chad.banner') }}" class="nav-link {{(request()->routeIs('chad.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('chad.section1') }}" class="nav-link {{(request()->routeIs('chad.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('chad.section2') }}" class="nav-link {{(request()->routeIs('chad.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('ghana*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> GHANA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('ghana.banner') }}" class="nav-link {{(request()->routeIs('ghana.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('ghana.section1') }}" class="nav-link {{(request()->routeIs('ghana.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('ghana.section2') }}" class="nav-link {{(request()->routeIs('ghana.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('southafrica*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SOUTH AFRICA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('southafrica.banner') }}" class="nav-link {{(request()->routeIs('southafrica.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('southafrica.section1') }}" class="nav-link {{(request()->routeIs('southafrica.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('southafrica.section2') }}" class="nav-link {{(request()->routeIs('southafrica.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('zimbabwe*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> ZIMBABWE <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('zimbabwe.banner') }}" class="nav-link {{(request()->routeIs('zimbabwe.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('zimbabwe.section1') }}" class="nav-link {{(request()->routeIs('zimbabwe.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('zimbabwe.section2') }}" class="nav-link {{(request()->routeIs('zimbabwe.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('cameroon*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CAMEROON <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('cameroon.banner') }}" class="nav-link {{(request()->routeIs('cameroon.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cameroon.section1') }}" class="nav-link {{(request()->routeIs('cameroon.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cameroon.section2') }}" class="nav-link {{(request()->routeIs('cameroon.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('drc*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> DRC <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('drc.banner') }}" class="nav-link {{(request()->routeIs('drc.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('drc.section1') }}" class="nav-link {{(request()->routeIs('drc.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('drc.section2') }}" class="nav-link {{(request()->routeIs('drc.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('cotedivoire*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> COTE D&apos;IVOIRE <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('cotedivoire.banner') }}" class="nav-link {{(request()->routeIs('cotedivoire.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cotedivoire.section1') }}" class="nav-link {{(request()->routeIs('cotedivoire.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('cotedivoire.section2') }}" class="nav-link {{(request()->routeIs('cotedivoire.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('usa*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> USA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('usa.banner') }}" class="nav-link {{(request()->routeIs('usa.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('usa.section1') }}" class="nav-link {{(request()->routeIs('usa.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('usa.section2') }}" class="nav-link {{(request()->routeIs('usa.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('india*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> INDIA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('india.banner') }}" class="nav-link {{(request()->routeIs('india.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('india.section1') }}" class="nav-link {{(request()->routeIs('india.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('india.section2') }}" class="nav-link {{(request()->routeIs('india.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('south_america*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> SOUTH AMERICA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('south_america.banner') }}" class="nav-link {{(request()->routeIs('south_america.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('south_america.section1') }}" class="nav-link {{(request()->routeIs('south_america.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('south_america.section2') }}" class="nav-link {{(request()->routeIs('south_america.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('uganda*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> UGANDA <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('uganda.banner') }}" class="nav-link {{(request()->routeIs('uganda.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('uganda.section1') }}" class="nav-link {{(request()->routeIs('uganda.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('uganda.section2') }}" class="nav-link {{(request()->routeIs('uganda.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  OUTREACH Page End  --}}


                    {{--  OPPORTUNITIES Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['opportunities*','opporagr*','opporcons*','oppormining*','opporrfx*','listofpro*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> OPPORTUNITIES <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('opportunities*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> OPPORTUNITIES <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('opportunities.banner') }}" class="nav-link {{(request()->routeIs('opportunities.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opportunities.section1') }}" class="nav-link {{(request()->routeIs('opportunities.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opportunities.section2') }}" class="nav-link {{(request()->routeIs('opportunities.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('opporagr*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> AGRICULTURE <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('opporagr.banner') }}" class="nav-link {{(request()->routeIs('opporagr.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporagr.section1') }}" class="nav-link {{(request()->routeIs('opporagr.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporagr.section2') }}" class="nav-link {{(request()->routeIs('opporagr.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('opporcons*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CONSTRUCTION <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('opporcons.banner') }}" class="nav-link {{(request()->routeIs('opporcons.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporcons.section1') }}" class="nav-link {{(request()->routeIs('opporcons.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporcons.section2') }}" class="nav-link {{(request()->routeIs('opporcons.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('oppormining*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> MINING <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('oppormining.banner') }}" class="nav-link {{(request()->routeIs('oppormining.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('oppormining.section1') }}" class="nav-link {{(request()->routeIs('oppormining.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('oppormining.section2') }}" class="nav-link {{(request()->routeIs('oppormining.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('opporrfx*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> RFX <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('opporrfx.banner') }}" class="nav-link {{(request()->routeIs('opporrfx.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporrfx.section1') }}" class="nav-link {{(request()->routeIs('opporrfx.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporrfx.section2') }}" class="nav-link {{(request()->routeIs('opporrfx.section2')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('opporrfx.section3') }}" class="nav-link {{(request()->routeIs('opporrfx.section3')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 3</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('listofpro*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> List Of Projects <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('listofpro.banner') }}" class="nav-link {{(request()->routeIs('listofpro.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('listofpro.index') }}" class="nav-link {{(request()->routeIs('listofpro.index','listofpro.create','listofpro.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Projects</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('memberdirectory*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> Member Directroy <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('memberdirectory.banner') }}" class="nav-link {{(request()->routeIs('memberdirectory.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('memberdirectory.index') }}" class="nav-link {{(request()->routeIs('memberdirectory.index','memberdirectory.create','memberdirectory.edit')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Members</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  OPPORTUNITIES Page End  --}}


                    {{--  CAREERS Page Start  --}}
                    <li class="nav-item {{(request()->routeIs(['careers*','jobs*','job_applicants'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link"> <i class="nav-icon far fa-plus-square"></i>
                            <p> CAREERS <i class="fas fa-angle-left right"></i> </p>
                        </a>
                        <ul class="nav nav-treeview ml-2">
                            <li class="nav-item {{ (request()->routeIs('careers*')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> CAREERS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('careers.banner') }}" class="nav-link {{(request()->routeIs('careers.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('careers.section1') }}" class="nav-link {{(request()->routeIs('careers.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('careers.index') }}" class="nav-link {{(request()->routeIs('careers.index')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item {{ (request()->routeIs('jobs*','job_applicants')) ? 'menu-is-opening menu-open' : '' }}">
                                <a href="#" class="nav-link"> <i class="far fas fa-book nav-icon"></i>
                                    <p> JOB OPENINGS <i class="fas fa-angle-left right"></i> </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('jobs.banner') }}" class="nav-link {{(request()->routeIs('jobs.banner')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Banner</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('jobs.section1') }}" class="nav-link {{(request()->routeIs('jobs.section1')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 1</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('jobs.index') }}" class="nav-link {{(request()->routeIs('jobs.index','jobs.create','jobs.edit','job_applicants')) ? 'active' : ''}}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Section 2</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    {{--  CAREERS Page End  --}}

                    {{-- Privacy policy start --}}
                    <li class="nav-item {{(request()->routeIs(['privacy.section1','privacy.section2','privacy.banner'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                PRIVACY POLICY
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('privacy.banner') }}" class="nav-link {{(request()->routeIs('privacy.banner')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy.section1') }}" class="nav-link {{(request()->routeIs('privacy.section1')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('privacy.section2') }}" class="nav-link {{(request()->routeIs('privacy.section2')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- Privacy policy end --}}

                    {{-- terms and use start --}}
                    <li class="nav-item {{(request()->routeIs(['term.section1','term.section2','term.banner'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                TERM OF USE
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('term.banner') }}" class="nav-link {{(request()->routeIs('term.banner')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Banner</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('term.section1') }}" class="nav-link {{(request()->routeIs('term.section1')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 1</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('term.section2') }}" class="nav-link {{(request()->routeIs('term.section2')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Section 2</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- terms and use end --}}

                    {{-- widgets section start  --}}
                    <li class="nav-item {{(request()->routeIs(['joinWidget*','eventWidget*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                WIDGETS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('joinWidget') }}" class="nav-link {{(request()->routeIs('joinWidget*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Join Widget</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('eventWidget') }}" class="nav-link {{(request()->routeIs('eventWidget*')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Event Widget</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- widgets section end  --}}

                    {{-- User data section start --}}
                    <li class="nav-item {{(request()->routeIs(['contactus.data','contactus.detail','company.Info','companyInfo.detail','experience.detail','event.request','eventRequest.detail','subscribers','experience','member.feedback','memberFeedback.detail','userfinancialforms*'])) ? 'menu-is-opening menu-open' : ''}}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                USER DATA
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('contactus.data') }}" class="nav-link {{(request()->routeIs('contactus.data','contactus.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>CONTACT US</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('company.Info') }}" class="nav-link {{(request()->routeIs('company.Info','companyInfo.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>COMPANY INFO</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('event.request') }}" class="nav-link {{(request()->routeIs('event.request','eventRequest.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>EVENT REQUEST</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('subscribers') }}" class="nav-link {{(request()->routeIs('subscribers')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>SUBSCRIBERS</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('experience') }}" class="nav-link {{(request()->routeIs('experience','experience.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>EXPERIENCE</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('member.feedback') }}" class="nav-link {{(request()->routeIs('member.feedback','memberFeedback.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>MEMBER FEEDBACK</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('userfinancialforms.index') }}" class="nav-link {{(request()->routeIs('userfinancialforms.index','userfinancialforms.detail')) ? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>FINANCIAL_FORMS_REQ...</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- User data section end --}}

                    {{-- Users section start --}}
                    <li class="nav-item {{(request()->routeIs(['registerusers.index','membershipuser*','registerusers.detail'])) ? 'menu-is-opening menu-open' : ''}}">    
                        <a href="{{ route('registerusers.index') }}" class="nav-link {{(request()->routeIs('registerusers.index','registerusers.detail','membershipuser*')) ? 'active' : ''}}">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                REGISTERED USERS
                            </p>
                        </a>
                    </li>
                    {{-- Users section end --}}

                    <li class="nav-item">
                        <a href="{{ route('admin.sociallinks') }}" class="nav-link {{(request()->routeIs('admin.sociallinks')) ? 'active' :''}}">
                            <i class="nav-icon fas fa-globe"></i>
                            <p>
                                SOCIAL LINKS
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.setting') }}" class="nav-link {{(request()->routeIs('admin.setting')) ? 'active' :''}}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                SETTING
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
