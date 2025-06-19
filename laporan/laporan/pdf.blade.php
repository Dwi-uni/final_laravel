<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Laporan Produk & Stok</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>Rp {{ number_format($p->price) }}</td>
                    <td>{{ $p->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
