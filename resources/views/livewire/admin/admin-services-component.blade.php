<div>
    <h1>Admin service list</h1>

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>price</th>
            <th>status</th>
            <th>category</th>
            <th>action</th>
        </tr>
        @foreach ($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
            <td><img width="150px" src="{{ asset('images/services/thumbnails') }}/{{ $service->thumbnails }}" alt=""></td>
            <td>{{ $service->name }}</td>
            <td>{{ $service->price }}</td>
            <td>
                @if ($service->status)
                Active
                @else
                Disactive
                @endif
            </td>
            <td>{{ $service->category->name }}</td>
            <td>
                <a href="{{ route('admin.edit_service', ['service_slug' => $service->slug]) }}">Edit</a>
                <a href="#" onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()" wire:click.prevent="deleteService({{ $service->id }})">Delete</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                <a href="{{ route('admin.add_service') }}">Add new service</a>
            </td>
        </tr>
    </table>

    {{ $services->links() }}
</div>