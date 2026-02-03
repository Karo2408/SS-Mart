<h2>Data Produk</h2>

<a href="/products/create">+ Tambah Produk</a>

<table border="1" cellpadding="10">
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>

@foreach($products as $p)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $p->nama_produk }}</td>
    <td>{{ $p->category->nama_kategori }}</td>
    <td>{{ $p->harga }}</td>
    <td>{{ $p->stok }}</td>
    <td>
        <a href="/products/{{ $p->id }}/edit">Edit</a>

        <form method="POST" action="/cart/add/{{ $p->id }}">
            @csrf
            <button type="submit">+ Keranjang</button>
            </form>

        <form action="/products/{{ $p->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach
</table>
