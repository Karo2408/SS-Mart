<h2>Edit Produk</h2>

<form method="POST" action="/products/{{ $product->id }}">
@csrf
@method('PUT')

<input type="text" name="nama_produk"
       value="{{ $product->nama_produk }}" required><br><br>

<select name="category_id">
@foreach($categories as $cat)
<option value="{{ $cat->id }}"
    {{ $product->category_id == $cat->id ? 'selected' : '' }}>
    {{ $cat->nama_kategori }}
</option>
@endforeach
</select><br><br>

<input type="number" name="harga" value="{{ $product->harga }}" required><br><br>
<input type="number" name="stok" value="{{ $product->stok }}" required><br><br>

<textarea name="deskripsi">{{ $product->deskripsi }}</textarea><br><br>

<button type="submit">Update</button>
</form>

<a href="/products">Kembali</a>
