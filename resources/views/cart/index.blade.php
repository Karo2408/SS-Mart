<h2>Keranjang Belanja</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Produk</th>
    <th>Harga</th>
    <th>Qty</th>
    <th>Subtotal</th>
    <th>Aksi</th>
</tr>

@php $total = 0; @endphp

@foreach($items as $item)
@php
$subtotal = $item->product->harga * $item->qty;
$total += $subtotal;
@endphp

<tr>
    <td>{{ $item->product->nama_produk }}</td>
    <td>{{ $item->product->harga }}</td>
    <td>{{ $item->qty }}</td>
    <td>{{ $subtotal }}</td>
    <td>
        <form method="POST" action="/cart/{{ $item->id }}">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </td>
</tr>
@endforeach

<tr>
    <td colspan="3"><b>Total</b></td>
    <td colspan="2"><b>{{ $total }}</b></td>
</tr>
</table>
