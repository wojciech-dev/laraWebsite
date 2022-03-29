<div>
    <h1>Admin service category</h1>

    <table>
        <tr>
            <th>#</th>
            <th>image</th>
            <th>name</th>
            <th>slug</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td><img width="150px" src="{{ $category->image }}" alt=""></td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
        </tr>
        @endforeach
    </table>
</div>