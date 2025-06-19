@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Laporan Produk & Stok</h2>

    <a href="{{ route('laporan.export.pdf') }}" class="btn btn-danger">Export PDF</a>
    <a href="{{ route('laporan.export.excel') }}" class="btn btn-success">Export Excel</a>

    <table class="table mt-3">
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

    <canvas id="chartKategori" height="100"></canvas>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartKategori');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($categories->pluck('name')) !!},
            datasets: [{
                label: 'Jumlah Produk per Kategori',
                data: {!! json_encode($categories->pluck('products_count')) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        }
    });
</script>
@endsection
