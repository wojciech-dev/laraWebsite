<div>
    <h1>All slides</h1>

    <table width="100%" border="1" cellpadding="10">
        <tr>
            <th>id</th>
            <th>image</th>
            <th>title</th>
            <th>status</th>
            <th>action</th>
        </tr>
        @foreach ($slides as $slide)
        <tr>
            <td>{{ $slide->id }}</td>
            <td><img width="150px" src="{{ asset('images/slider') }}/{{ $slide->image }}" alt=""></td>
            <td>{{ $slide->title }}</td>
            <td>
                @if ($slide->status)
                Active
                @else
                Disactive
                @endif
            </td>
            <td>
                <a href="{{ route('admin.edit_slide', ['slide_id' => $slide->id]) }}">Edit</a>
                <a href="#" onclick="confirm('Are you sure want to delete?') || event.stopImmediatePropagation()"
                    wire:click.prevent="deleteslide({{ $slide->id }})">Delete</a>
            </td>
        </tr>
        @endforeach
        <tr>
            <td>
                <a href="{{ route('admin.add_slide') }}">Add new slide</a>
            </td>
        </tr>
    </table>

    {{ $slides->links() }}
</div>