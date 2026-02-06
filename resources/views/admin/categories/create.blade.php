<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Category</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 400px;
            margin: 40px auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #d1d5db;
            margin-bottom: 15px;
            font-size: 14px;
        }

        input:focus {
            outline: none;
            border-color: #16a34a;
            box-shadow: 0 0 0 2px rgba(22,163,74,0.2);
        }

        .btn-save {
            width: 100%;
            padding: 10px;
            background: #16a34a;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-save:hover {
            background: #15803d;
        }

        .btn-back {
            display: block;
            margin-top: 15px;
            text-align: center;
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
        }

        .btn-back:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>➕ Tambah Category</h2>

    <form method="POST" action="/categories">
        @csrf

        <label>Nama Category</label>
        <input type="text"
               name="nama_kategori"
               placeholder="Nama Category"
               required>

        <button type="submit" class="btn-save">
            💾 Simpan Category
        </button>
    </form>

    <a href="/categories" class="btn-back">
        ← Kembali ke Data Categories
    </a>
</div>

</body>
</html>
