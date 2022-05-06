<div>
    <h1>Profilee</h1>

    @if($provider->image)
    <img src="{{ asset('images/providers') }}/{{ $provider->image }}" alt="avatar">
    @else
    <img src="{{ asset('images/providers/no_photo.jpg') }}" alt="no_photo">
    @endif

    <h3>Name: {{ Auth::user()->name }}</h3>
    <p>{{ $provider->about }}</p>
    <div>Email: {{ Auth::user()->email }}</div>
    <div>Phone: {{ Auth::user()->phone }}</div>
    @if($provider->service_category_id)
    <div>Service category: {{ $provider->category->name }}</div>
    @endif
    <a href="{{ route('provider.edit_profile') }}">Edit profile</a>
</div>