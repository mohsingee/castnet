@forelse($results as $item)
<div class="event_box">
    <h3 class="event_title">{{ $item->title }}</h3>
    <p class="event_meta">{{ \Carbon\Carbon::parse($item->event_date)->format('d F Y') }} At {{ \Carbon\Carbon::parse($item->from_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($item->to_time)->format('h:i A') }} PT</p>
    <p class="event_desc">{{ $item->description }}</p>
    <a href="#" class="btn btn-primary">{{ $item->category == 1 ? 'Chamber Events' : 'Community Events' }}</a>
</div>
@empty
<div class="event_box">
    <p class="text-center">No records were found.</p>
</div>
@endforelse