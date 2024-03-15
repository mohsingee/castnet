@foreach($members as $member)
    <div class="col" data-aos="fade-right" data-aos-duration="1000">
        <div class="sec-dir-card text-center">
            <img src="{{ asset('assets/web/images/'.$member->image) }}" alt="card-img">
            <h3 class="sec-dir-card-title">{{$member->name}}</h3>
            <div class="sec-dir-card-info">
                <p class="sec-dir-card-company">Company:</p>
                <p class="sec-dir-card-company-text">{{$member->company}}</p>
            </div>
            <div class="sec-dir-card-info">
                <p class="sec-dir-card-company">Position:</p>
                <p class="sec-dir-card-company-text">{{$member->position}}</p>
            </div>
            <div class="sec-dir-card-info">
                <p class="sec-dir-card-company">Member Type:</p>
                <p class="sec-dir-card-company-text">{{$member->member_type}}</p>
            </div>
            <div class="sec-dir-card-med-icon">
                <a href="{{$member->lindedin}}" class="media-icon-bg">
                    <i class="fa-brands fa-linkedin-in"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach