<div>
    <h1>Admin contact component</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <table>
        <tr>
            <th>#</th>
            <th>name</th>
            <th>email</th>
            <th>phone</th>
            <th>message</th>
        </tr>
        @foreach ($contacts as $contact)
        <tr>
            <td>{{ $contact->id }}</td>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ $contact->phone }}</td>
            <td>{{ $contact->message }}</td>
        </tr>
        @endforeach
    </table>
</div>
