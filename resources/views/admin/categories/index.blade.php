<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Categories</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }

        .container {
            width: 700px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 15px;
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 14px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-add:hover {
            background: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #e5e7eb;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        tbody tr:hover {
            background: #eef2ff;
        }

        .aksi a,
        .aksi button {
            padding: 6px 10px;
            border-radius: 5px;
            border: none;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-hapus {
            background: #dc2626;
        }

        .aksi form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📂 Data Categories</h2>

    <a href="/admin/categories/create" class="btn-add">
        + Tambah Category
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @foreach($categories as $cat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $cat->nama_kategori }}</td>
                <td class="aksi">
                    <a href="/admin/categories/{{ $cat->id }}/edit" class="btn-edit">
                        Edit
                    </a>

                    <form action="/admin/categories/{{ $cat->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn-hapus"
                                onclick="return confirm('Yakin mau hapus kategori ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
