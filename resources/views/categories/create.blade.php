<h2>Tambah Category</h2>

<form method="POST" action="/categories">
@csrf

<input type="text" name="nama_kategori" placeholder="Nama Category" required><br><br>

<button type="submit">Simpan</button>

</form>

<a href="/categories">Kembali</a>
