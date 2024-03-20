<div class="dashboard_side flex-lg-grow-1">
    <div class="profile-box">
        <img src="{{ asset('assets/web/images/dashboard_profile.png') }}" alt="profile" class="profile-img">
        <h3 class="profile-text mb-3">{{ Auth::user()->first_name }}</h3>
    </div>
    <div class="d-flex gap-4 gap-lg-0 align-items-center justify-content-center flex-lg-column flex-wrap w-lg-100 tab-list">
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-dashboard'])) ? 'active' : ''}}" href="{{route('web.user-dashboard')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>Account setting</span>
                </div>
            </div>
        </a>
        @if(auth()->user()->member==1)
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-member'])) ? 'active' : ''}}" href="{{route('web.user-member')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>member account</span>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->sponsor==1)
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-sponsor'])) ? 'active' : ''}}" href="{{route('web.user-sponsor')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>sponser account</span>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->partner==1)
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-partner'])) ? 'active' : ''}}" href="{{route('web.user-partner')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>partner account</span>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->member==1 || auth()->user()->sponsor==1)
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-financialForms','web.user-financialDetail'])) ? 'active' : ''}}" href="{{route('web.user-financialForms')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>Financial Forms</span>
                </div>
            </div>
        </a>
        @endif
        @if(auth()->user()->member==1 || auth()->user()->sponsor==1 || auth()->user()->partner==1)
        <a class="dashboard-link tablinks {{(request()->routeIs(['web.user-eventReqForms','web.user-eventReqDetail'])) ? 'active' : ''}}" href="{{route('web.user-eventReqForms')}}">
            <div class="dashboard-links">
                <div class="d-flex align-items-center gap-2 gap-lg-4">
                    <img src="{{ asset('assets/web/images/icon_group.png') }}" alt="icon" class="icons">
                    <span>event request</span>
                </div>
            </div>
        </a>
        @endif
    </div>
</div>