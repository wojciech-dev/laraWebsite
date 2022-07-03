<div>
    <h1>Service providers</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <table>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>city</th>
            <th>service category</th>
            <th>service locations</th>
        </tr>
        @foreach ($providers as $provider)
        <tr>
            <td>{{ $provider->id }}</td>
            <td><img width="50px" src="{{ asset('images/providers') }}/{{ $provider->image }}" alt=""></td>
            <td>{{ $provider->user->name }}</td>
            <td>{{ $provider->user->email }}</td>
            <td>{{ $provider->user->phone }}</td>
            <td>{{ $provider->category->name }}</td>
            <td>{{ $provider->service_locations }}</td>
        </tr>
        @endforeach
    </table>
    {{ $providers->links() }}
</div>