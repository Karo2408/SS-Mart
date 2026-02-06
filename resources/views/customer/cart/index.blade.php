<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 800px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        h2 {
            margin-bottom: 20px;
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

        .harga {
            color: #16a34a;
            font-weight: bold;
        }

        .total-row {
            background: #e0e7ff;
            font-weight: bold;
        }

        .btn-hapus {
            padding: 6px 10px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-hapus:hover {
            background: #b91c1c;
        }

        .qty-control {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .qty-btn {
            padding: 4px 10px;
            border: none;
            background: #2563eb;
            color: white;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .qty-btn.minus {
            background: #dc2626;
        }

        .qty-number {
            min-width: 24px;
            text-align: center;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        .back {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #2563eb;
            font-size: 14px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>🛒 Keranjang Belanja</h2>

    @if($items->count() == 0)
        <div class="empty">
            Keranjang masih kosong 😶
        </div>
    @else
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @php $total = 0; @endphp

        @foreach($items as $item)
            @php
                $subtotal = $item->product->harga * $item->qty;
                $total += $subtotal;
            @endphp
            <tr>
                <td>{{ $item->product->nama_produk }}</td>

                <td class="harga">
                    Rp {{ number_format($item->product->harga,0,',','.') }}
                </td>

                {{-- QTY + / - --}}
                <td>
                    <div class="qty-control">

                        <form action="/cart/{{ $item->id }}/decrease" method="POST">
                            @csrf
                            <button type="submit" class="qty-btn minus">−</button>
                        </form>

                        <span class="qty-number">{{ $item->qty }}</span>

                        <form action="/cart/{{ $item->id }}/increase" method="POST">
                            @csrf
                            <button type="submit" class="qty-btn">+</button>
                        </form>

                    </div>
                </td>

                <td class="harga">
                    Rp {{ number_format($subtotal,0,',','.') }}
                </td>

                <td>
                    <form method="POST" action="/cart/{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="btn-hapus"
                                onclick="return confirm('Hapus produk dari keranjang?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
            <tr class="total-row">
                <td colspan="3">Total</td>
                <td colspan="2">
                    Rp {{ number_format($total,0,',','.') }}
                </td>
            </tr>
        </tfoot>
    </table>
    @endif

    <a href="/products" class="back">
        ← Lanjut Belanja
    </a>
</div>

</body>
</html>
