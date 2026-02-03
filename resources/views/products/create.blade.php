<h2>Tambah Produk</h2>

<form method="POST" action="/products">
@csrf

<input type="text" name="nama_produk" placeholder="Nama Produk" required><br><br>

<select name="category_id" required>
    <option value="">-- Pilih Kategori --</option>
    @foreach($categories as $cat)
        <option value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
    @endforeach
</select><br><br>

<input type="number" name="harga" placeholder="Harga" required><br><br>
<input type="number" name="stok" placeholder="Stok" required><br><br>

<textarea name="deskripsi" placeholder="Deskripsi"></textarea><br><br>

<button type="submit">Simpan</button>
</form>

<a href="/products">Kembali</a>
