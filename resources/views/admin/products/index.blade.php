<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
        }

        .container {
            width: 90%;
            margin: 40px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
        }

        .btn-add:hover {
            background: #1e40af;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #e5e7eb;
        }

        table th,
        table td {
            padding: 12px;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        table tbody tr:hover {
            background: #eef2ff;
        }

        .badge {
            background: #e5e7eb;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .harga {
            color: green;
            font-weight: bold;
        }

        .aksi a,
        .aksi button {
            padding: 6px 10px;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background: #f59e0b;
        }

        .btn-cart {
            background: #2563eb;
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
        <h2>📦 Data Produk</h2>

        <a href="/products/create" class="btn-add">+ Tambah Produk</a>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Foto</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if ($p->images->count())
                                <img src="{{ asset('storage/' . $p->images->first()->image_path) }}" width="60"
                                    style="border-radius:6px;">
                            @else
                                <span style="font-size:12px;color:#888">No Image</span>
                            @endif
                        </td>

                        <td>{{ $p->nama_produk }}</td>

                        <td>
                            <span class="badge">
                                {{ $p->category->nama_kategori }}
                            </span>
                        </td>

                        <td class="harga">
                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </td>

                        <td>{{ $p->stok }}</td>

                        <td class="aksi">
                            <a href="/products/{{ $p->id }}/edit" class="btn-edit">Edit</a>

                            <form method="POST" action="/cart/add/{{ $p->id }}">
                                @csrf
                                <button class="btn-cart">+ Keranjang</button>
                            </form>

                            <form method="POST" action="/products/{{ $p->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn-hapus" onclick="return confirm('Yakin mau hapus?')">
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
