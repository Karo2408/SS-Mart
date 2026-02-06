<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>

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

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-save {
            background: #16a34a;
            color: white;
            width: 100%;
        }

        .btn-save:hover {
            background: #15803d;
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
        <h2>➕ Tambah Produk</h2>

        <form method="POST" action="/products" enctype="multipart/form-data">
            @csrf

            <label>Nama Produk</label>
            <input type="text" name="nama_produk" placeholder="Nama Produk" required>

            <label>Kategori</label>
            <select name="category_id" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <label>Foto Produk</label>
            <input type="file" name="images[]" multiple>

            <label>Harga</label>
            <input type="number" name="harga" placeholder="Harga" required>

            <label>Stok</label>
            <input type="number" name="stok" placeholder="Stok" required>

            <label>Deskripsi</label>
            <textarea name="deskripsi" placeholder="Deskripsi produk"></textarea>

            <button type="submit" class="btn btn-save">
                💾 Simpan Produk
            </button>
        </form>

        <a href="/products" class="btn-back">
            ← Kembali ke Data Produk
        </a>
    </div>

</body>

</html>
