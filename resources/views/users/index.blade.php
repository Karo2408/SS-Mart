<h2>Data User</h2>
<a href="{{ route('users.create') }}">Tambah User</a>

<table border="1">
@foreach ($users as $u)
<tr>
    <td>{{ $u->nama }}</td>
    <td>{{ $u->email }}</td>
    <td>{{ $u->role }}</td>
    <td>
        <a href="{{ route('users.edit',$u->id_user) }}">Edit</a>
        <form action="{{ route('users.destroy',$u->id_user) }}" method="POST">
            @csrf @method('DELETE')
            <button>Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
