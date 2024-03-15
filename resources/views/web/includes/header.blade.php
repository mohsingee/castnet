@php
    $result = socialLinks();
@endphp
<!-- Header Start -->
    <header>
        <!-- Topbar Start -->
        <section id="top" class="section_topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-lg-6">
                        <div class="d-flex gap-3">
                            <a href="{{ !empty($result->facebook) ? $result->facebook : '#' }}" class="social_link">
                                <img src="{{ asset('assets/web/images/icon_fb.png') }}" alt="social icons" class="img-icon">
                            </a>
                            <a href="{{ !empty($result->twitter) ? $result->twitter : '#' }}" class="social_link">
                                <img src="{{ asset('assets/web/images/icon_tw.png') }}" alt="social icons" class="img-icon">
                            </a>
                            <a href="{{ !empty($result->linkedin) ? $result->linkedin : '#' }}" class="social_link">
                                <img src="{{ asset('assets/web/images/icon_li.png') }}" alt="social icons" class="img-icon">
                            </a>
                            <a href="{{ !empty($result->instagram) ? $result->instagram : '#' }}" class="social_link">
                                <img src="{{ asset('assets/web/images/icon_ig.png') }}" alt="social icons" class="img-icon">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="d-flex gap-4 justify-content-md-end">
                            {{-- <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="site search">
                                    <button type="submit" class="btn-search">
                                        <img src="{{ asset('assets/web/images/icon_search.png') }}" alt="search">
                                    </button>
                                </div>
                            </form> --}}
                            {{-- @auth
                            <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"> <span>Logout</span>
                                <img src="{{ asset('assets/web/images/icon_log.png') }}" alt="icon login" class="icon-login"></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf   
                            </form>
                            @else
                            <a href="{{route('user.login')}}" class="btn btn-primary">
                                <span>Login</span>
                                <img src="{{ asset('assets/web/images/icon_log.png') }}" alt="icon login" class="icon-login">
                            </a>
                            @endauth --}}
                            {{-- dashbord work starttttttttttttttttttttttttttttttttt --}}
                            @auth
                            <div class="dropdown profile-dropdown">
                                <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/web/images/user.jpg') }}" alt="profile" class="img-profile">
                                    <img src="{{ asset('assets/web/images/down-arrow.png') }}" alt="profile" class="img-profile">
                                </button>
                                <ul class="dropdown-menu">  
                                    <li><a class="dropdown-item" href="{{ route('web.user-dashboard') }}">Profile</a></li>  
                                    <hr/>                                  
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> <span>Logout</span>
                                        <img src="{{ asset('assets/web/images/icon_log.png') }}" alt="icon login" class="icon-login"></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf   
                                    </form>                                   
                                    </li>
                                </ul>
                            </div>
                            @else
                            <a href="{{route('user.login')}}" class="btn btn-primary">
                                <span>Login</span>
                                <img src="{{ asset('assets/web/images/icon_log.png') }}" alt="icon login" class="icon-login">
                            </a>
                            @endauth
                            {{-- dashbord work endddddddddddddddddddddddddddddddddddddddddddddd --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @php
        $setting = appSetting();
    @endphp
 

<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white">
    <div class="container">
        <a class="navbar-brand" href="{{ route('web.index') }}">
            <img src="{{ asset('assets/web/images/'.$setting->header_logo) }}" alt="logo" class="img-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-start">
                <li class="nav-item"><a class="nav-link active" href="{{ route('web.index') }}">home</a></li>
                <li class="nav-item dropdown-link">
                    <a class="nav-link" href="{{ route('web.about') }}">about us</a>
                    <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="angle_down" class="img-icon">
                    <ul class="dropdown-content">
                        <li><a href="{{ route('web.who-we-are') }}">who we are</a></li>
                        <li><a href="{{ route('web.team') }}">team</a></li>
                        <li><a href="{{ route('web.contactus') }}">contact us</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown-link">
                    <a class="nav-link" href="{{ route('web.membership') }}">membership</a>
                    <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="angle_down" class="img-icon">
                    <ul class="dropdown-content">
                        <li><a href="{{ route('web.join') }}">join</a></li>
                        <li><a href="{{ route('web.benefits') }}">benefits</a></li>
                        <li><a href="{{ route('web.programs') }}">programs</a></li>
                        <li><a href="{{ route('web.evaluation') }}">evaluation</a></li>
                        <li><a href="{{ route('web.rules_of_engagement') }}">rules of engagement</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown-link">
                    <a class="nav-link" href="{{ route('web.sectors') }}">sectors</a>
                    <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="angle_down" class="img-icon">
                    <ul class="dropdown-content">
                        <li><a href="{{ route('web.construction') }}">construction</a></li>
                        <li><a href="{{ route('web.agriculture') }}">agriculture</a></li>
                        <li><a href="{{ route('web.supply_chain') }}">supply chain</a></li>
                        <li><a href="{{ route('web.technology') }}">technology</a></li>
                        <li><a href="{{ route('web.natural_resources') }}">natural resources</a></li>
                        <li><a href="{{ route('web.energy') }}">energy</a></li>
                        <li><a href="{{ route('web.textiles') }}">textiles</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown-link">
                    <a class="nav-link" href="{{ route('web.advocacy') }}">advocacy</a>
                    <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="angle_down" class="img-icon">
                    <ul class="dropdown-content">
                        <li><a href="{{ route('web.small_businesses') }}">small businesses</a></li>
                        <li><a href="{{ route('web.women') }}">women</a></li>
                        <li><a href="{{ route('web.veterans') }}">veterans</a></li>
                        <li><a href="{{ route('web.support_services') }}">support services</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown-link">
                    <a class="nav-link" href="{{ route('web.events') }}">events</a>
                    <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="angle_down" class="img-icon">
                    <ul class="dropdown-content">
                        <li><a href="{{ route('web.event_calendar') }}">event calendar</a></li>
                        <li><a href="{{ route('web.event_request') }}">event request</a></li>
                        <li><a href="{{ route('web.international_events') }}">international events</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('web.blog') }}">blog</a>
                </li>
                <li class="nav-item">
                    <a data-bs-toggle="offcanvas" href="#offcanvasMenu" role="button" aria-controls="offcanvasExample">
                        <img src="{{ asset('assets/web/images/icon_menu.png') }}" alt="menu" class="img-menu">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
    <div class="offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="ps-0">
            <li class="offcanvas-menu">
                <a href="{{ route('web.financial') }}" class="link">financial</a>
                <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="icon" class="img-icon">
                <ul class="sub_menu">
                    <li><a href="{{ route('web.grants') }}">grants</a></li>
                    <li><a href="{{ route('web.funding') }}">funding</a></li>
                    <li><a href="{{ route('web.forms') }}">forms</a></li>
                </ul>
            </li>
        </ul>
        <ul class="ps-0">
            <li class="offcanvas-menu">
                <a href="{{ route('web.partners_sponsors') }}" class="link">partners / sponsors</a>
                <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="icon" class="img-icon">
                <ul class="sub_menu">
                    <li><a href="{{ route('web.become_partner') }}">become a partner</a></li>
                    <li><a href="{{ route('web.become_sponsor') }}">become a sponsor</a></li>
                </ul>
            </li>
        </ul>
        <ul class="ps-0">
            <li class="offcanvas-menu">
                <a href="{{ route('web.outreach') }}" class="link">outreach</a>
                <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="icon" class="img-icon">
                <ul class="sub_menu">
                    <li><a href="{{ route('web.chad') }}">chad</a></li>
                    <li><a href="{{ route('web.ghana') }}">ghana</a></li>
                    <li><a href="{{ route('web.south_africa') }}">south africa</a></li>
                    <li><a href="{{ route('web.zimbabwe') }}">zimbabwe</a></li>
                    <li><a href="{{ route('web.cameroon') }}">cameroon</a></li>
                    <li><a href="{{ route('web.drc') }}">drc</a></li>
                    <li><a href="{{ route('web.cote_divoire') }}">cote d'ivoire</a></li>
                    <li><a href="{{ route('web.usa') }}">usa</a></li>
                    <li><a href="{{ route('web.india') }}">india</a></li>
                    <li><a href="{{ route('web.south_america') }}">south america</a></li>
                    <li><a href="{{ route('web.uganda') }}">uganda</a></li>
                </ul>
            </li>
        </ul>
        <ul class="ps-0">
            <li class="offcanvas-menu">
                <a href="{{ route('web.opportunities') }}" class="link">opportunities</a>
                <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="icon" class="img-icon">
                <ul class="sub_menu">
                    <li><a href="{{ route('web.opportunities_agriculture') }}">agriculture</a></li>
                    <li><a href="{{ route('web.opportunities_construction') }}">construction</a></li>
                    <li><a href="{{ route('web.mining') }}">mining</a></li>
                    <li><a href="{{ route('web.rfx') }}">rfx</a></li>
                    <li><a href="{{ route('web.member_directory') }}">Member Directory</a></li>
                </ul>
            </li>
        </ul>
        <ul class="ps-0">
            <li class="offcanvas-menu">
                <a href="{{ route('web.careers') }}"class="link">careers</a>
                <img src="{{ asset('assets/web/images/angle_down.png') }}" alt="icon" class="img-icon">
                <ul class="sub_menu">
                    <li><a href="{{ route('web.job_openings') }}">job openings</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- Navbar End -->
    </header>
