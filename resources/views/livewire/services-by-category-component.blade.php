<div>
    <h1>{{$category->name}}</h1>

    @foreach ($category->services as $service )
    <h5>{{ $service->name }}</h5>
    <div>thumbnail</div>
    @endforeach

</div>