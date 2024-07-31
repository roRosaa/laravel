<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Struk Transaksi</title>
    <style>
       
    </style>
</head>
<body>
    <h1>Struk Transaksi</h1>
    <p>Toko Buah</p>
    <p>Tanggal Transaksi: {{ $tanggal_transaksi }}</p>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Buah</th>
                <th>Jumlah Beli</th>
                <th>Harga</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_transaksi as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail['nama_buah'] }}</td>
                <td>{{ $detail['jumlah_beli'] }}</td>
                <td>{{ $detail['harga'] }}</td>
                <td>{{ $detail['total_harga'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total Bayar: {{ $total_bayar }}</p>
    <script>
        window.print();
    </script>
</body>
</html>
