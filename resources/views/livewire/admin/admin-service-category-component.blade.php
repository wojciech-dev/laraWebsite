<div>
    <h1>Admin service category</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <table>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>slug</th>
            <th>action</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><img width="150px" src="{{ asset('images/categories') }}/{{ $category->image }}" alt=""></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <a href="{{ route('admin.edit_service_category', ['category_id' => $category->id]) }}">Edit</a>
                <a href="#" onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()" wire:click.prevent="deleteServiceCategory({{ $category->id }})">Delete</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                <a href="{{ route('admin.add_service_category') }}">Add new category</a>
            </td>
        </tr>
    </table>
</div>