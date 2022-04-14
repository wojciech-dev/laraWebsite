<h1>{{ $service->name }}</h1>

<strong>{{ $service->price }}</strong>

<img src="{{ asset('images/services') }}/{{ $service->image }}" alt="">

@if($r_service)
<aside>
    <h5>Realted Service</h5>
    <img width="150px" src="{{ asset('images/services/thumbnails')}}/{{ $r_service->thumbnail }}" alt="">
    <h3>{{ $r_service->name }}</h3>
</aside>
@endif