<h2>Edit Category</h2>

<form method="POST" action="/categories/{{ $category->id }}">
@csrf
@method('PUT')

<input type="text" name="nama_kategori"
       value="{{ $category->nama_kategori }}" required><br><br>

<button type="submit">Update</button>

</form>

<a href="/categories">Kembali</a>
