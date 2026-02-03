<h2>Data Categories</h2>

<a href="/categories/create">+ Tambah Category</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    @foreach($categories as $cat)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $cat->nama_kategori }}</td>
        <td>
            <a href="/categories/{{ $cat->id }}/edit">Edit</a>

            <form action="/categories/{{ $cat->id }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
