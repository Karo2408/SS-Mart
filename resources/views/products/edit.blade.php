<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 500px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin-bottom: 15px;
            font-size: 14px;
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
        }

        .preview {
            margin-bottom: 15px;
            text-align: center;
        }

        .preview img {
            max-width: 200px;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-update {
            background: #2563eb;
            color: white;
            width: 100%;
        }

        .btn-update:hover {
            background: #1e40af;
        }

        .btn-back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
            text-align: center;
            width: 100%;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>✏️ Edit Produk</h2>

        <form method="POST" action="/products/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Nama Produk</label>
            <input type="text" name="nama_produk" value="{{ $product->nama_produk }}" required>

            <label>Kategori</label>
            <select name="category_id" required>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <label>Harga</label>
            <input type="number" name="harga" value="{{ $product->harga }}" required>

            <label>Stok</label>
            <input type="number" name="stok" value="{{ $product->stok }}" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi">{{ $product->deskripsi }}</textarea>

            <!-- FOTO LAMA -->
            <label>Foto Saat Ini</label>
            <div style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:15px">
                @forelse($product->images as $img)
                    <img src="{{ asset('storage/' . $img->image_path) }}"
                        style="width:90px;height:90px;object-fit:cover;border-radius:6px">
                @empty
                    <small>Tidak ada foto</small>
                @endforelse
            </div>

            <!-- TAMBAH FOTO BARU -->
            <label>Tambah Foto Baru</label>
            <input type="file" name="images[]" multiple accept="image/*">

            <button type="submit" class="btn btn-update">
                💾 Update Produk
            </button>
        </form>


        <a href="/products" class="btn-back">
            ← Kembali ke Data Produk
        </a>
    </div>

</body>

</html>
