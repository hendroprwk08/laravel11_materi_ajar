<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Data Produk</h3>
    <table border="1" width="100%" style="border-collapse: collapse;">
        <thead>
            <th width="150">Foto</th>
            <th>Nama</th>
            <th>Harga</th>
        </thead>
        <tbody>
            @foreach ($produkModel as $produk)
            <tr>
                <td>
                    @if (!empty($produk['foto']))
                    <img src="{{ public_path('/gambar/'. $produk['foto'] ) }}" width="80px">
                    @endif
                </td>
                <td>{{ $produk['nama'] }}</td>
                <td>{{ "Rp " . number_format( $produk['harga'], 2, ',', '.' ) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>