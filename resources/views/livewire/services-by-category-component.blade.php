<div>
    <h1>{{$category->name}}</h1>

    @foreach ($category->services as $service )
    <h5>{{ $service->name }}</h5>
    <div>thumbnail</div>
    <a href="{{ route('home.services_details', ['service_slug' => $service->slug]) }}">Read more</a>
    @endforeach

</div>