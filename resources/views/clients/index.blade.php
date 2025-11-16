<h1>Daftar Clients</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Redirect URL</th>
        <th>Aksi</th>
    </tr>

    @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ implode(', ', $client->redirect_uris ?? []) }}</td>
            <td>
                <a href="{{ route('clients.edit', $client->id) }}">Edit</a>
                <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus client?')">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
